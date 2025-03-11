<?php

namespace App\Http\Backend\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class PostController extends Controller
{
    //Backend
    public function allPost(Request $request)
    {

        $data = [
            'pageTitle' => 'Post Manage',
            'admins' => Admin::all()
        ];

        $query = Post::query();

        if ($request->has('category') && !empty($request->category)) {
            $query->where('id', $request->category);
        }


        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('title', 'LIKE', "%" . $search . "%");
        }
        $orderBy = $request->query('order_by', 'created_at');
        $order = $request->query('order', 'asc');
        $sortOptions = [
            'created_at' => [
                'label' => 'Created',
                'next_order' => ($orderBy === 'created_at' && $order === 'desc') ? 'asc' : 'desc'
            ],

            'updated_at' => [
                'label' => 'Updated',
                'next_order' => ($orderBy === 'updated_at' && $order === 'desc') ? 'asc' : 'desc'
            ],

            'visibility' => [
                'label' => 'Visibility',
                'next_order' => ($orderBy === 'visibility' && $order === 'desc') ? 'asc' : 'desc'
            ]
        ];
        $categories = Category::all();
        $posts = $query->with('author')->orderBy($orderBy, $order)->paginate(10);
        return view('back.pages.post.admin.admin-index', compact(['data', 'posts', 'order', 'orderBy', 'sortOptions', 'categories']));
    }
    public function addPost()
    {
        $data = [
            'pageTitle' => 'Add New Post',
            'admins' => Admin::all(),
            'categories' => Category::all(),
        ];
        return view('back.pages.post.admin.add-post', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required',
            'title' => 'required|unique:posts,title|min:3|max:100',
            'content' => 'array',
            'content.*' => 'required|string|min:1|max:10000',
            'category' => 'required|numeric|exists:categories,id',
            'post_featured_image' => 'bail|required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'content_image' => 'array',
            'content_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'tags' => 'required|string',
            'meta_keywords' => 'required',
            'meta_description' => 'nullable|string',
        ]);

        $featured_image_path = null;
        if ($request->hasFile('post_featured_image')) {
            $featured_image_path = time() . '_' . str_replace(' ', '', $request->post_featured_image->getClientOriginalName());
            $request->post_featured_image->move(public_path('storage/posts'), $featured_image_path);
        }
        $contents = [];
        foreach ($request->content as $content) {
            array_push($contents, $content);
        }
        $imagesURL = [];
        if ($request->hasFile('content_image')) {
            foreach ($request->file('content_image') as $image) {
                // remove white space in name
                $imagePath = time() . '_' . str_replace(' ', '', $image->getClientOriginalName());
                $image->move(public_path('storage/posts'), $imagePath);
                array_push($imagesURL, $imagePath);
            }
        }

        Post::create([
            'author' => $request->author,
            'category' => $request->category,
            'title' => $request->title,
            'content' => $contents,
            'post_featured_image' => $featured_image_path,
            'content_image' => $imagesURL,
            'tags' => $request->tags,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'visibility' => $request->visibility
        ]);
        return redirect('admin/post')->with('message', 'New post has been successfully created.');
    }

    public function status($id)
    {
        $posts = Post::find($id)->first();
        $posts->update([
            'visibility' => !($posts->visibility)
        ]);
        return redirect('admin/post');
    }

    public function edit($id)
    {
        $posts = Post::find($id);
        // dd($posts);
        $admins = Admin::all();
        $category = Category::all();
        $data = [
            'posts' => $posts,
            'admins' => $admins,
            'category' => $category,
        ];
        return view('back.pages.post.admin.edit-post', $data);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found');
        }
        $request->validate([
            'author' => 'required',
            'title' => 'required|string|min:3|max:100',
            'content' => 'array',
            'content.*' => 'required|string|min:1|max:10000',
            'category' => 'required|exists:categories,id',
            'post_featured_image' => 'nullable|bail|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'content_image' => 'array',
            'content_image.*' => 'nullable|bail|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'tags' => 'nullable|string',
            'meta_keywords' => 'required',
            'meta_description' => 'nullable|string',
            'visibility' => 'required|boolean'
        ]);

        $contents = [];
        foreach ($request->content as $content) {
            if ($content != null) {
                array_push($contents, $content);
            }
        }
        $content = $contents;
        $content_images = $post->content_image;

        if ($request->content_image) {
            foreach ($request->content_image as $key => $value) {
                // delete image of post if match key
                if (array_key_exists($key, $content_images)) {
                    Storage::disk('public')->delete('posts/' . $post->content_image[$key]);
                    //store new image
                    $imagePath = time() . '_' . str_replace(' ', '', $value->getClientOriginalName());
                    $request->content_image[$key]->move(public_path('storage/posts'), $imagePath);
                    $content_images[$key] = $imagePath;
                } else {
                    // store new image
                    $imagePath = time() . '_' . str_replace(' ', '', $value->getClientOriginalName());
                    $request->content_image[$key]->move(public_path('storage/posts'), $imagePath);
                    array_push($content_images, $imagePath);
                }
            }
        } else {
            $content_images = $post->content_image;
        }

        $featured_image_path = $post->post_featured_image;
        if ($request->hasFile("post_featured_image")) {
            if (!empty($post->post_featured_image)) {
                Storage::disk('public')->delete('posts/' . $post->post_featured_image);
            }
            $featured_image_path = time() . '_' . str_replace(' ', '', $request->post_featured_image->getClientOriginalName());
            $request->post_featured_image->move(public_path('storage/posts'), $featured_image_path);
        }
        $post->update([
            'author' => $request->input('author'),
            'category' => $request->category,
            'title' => $request->input('title'),
            'content' => $contents,
            'post_featured_image' => $featured_image_path,
            'content_image' => $content_images,
            'tags' => is_array($request->tags) ? implode(',', $request->tags) : $request->tags,
            'meta_keywords' => $request->input('meta_keywords'),
            'meta_description' => $request->input('meta_description'),
            'visibility' => $request->input('visibility')
        ]);
        return redirect('admin/post')->with('message', 'New post has been successfully edited.');
    }

    private function decodeContent($content)
    {
        // Giải mã nội dung nếu là chuỗi JSON
        return is_string($content) ? json_decode($content, true) ?? [] : [];
    }

    private function processContentImages($images, $existingImages)
    {
        $processedImages = [];

        if (!empty($images) && is_array($images)) {
            foreach ($images as $index => $image) {
                // Kiểm tra xem có tệp tin hình ảnh mới hay không
                if ($image && $image instanceof \Illuminate\Http\UploadedFile) {
                    if (!empty($existingImages[$index])) {
                        // Xóa hình ảnh cũ nếu có
                        Storage::delete('public/' . $existingImages[$index]);
                    }
                    // Lưu hình ảnh mới
                    $processedImages[] = $image->store('posts', 'public');
                } else {
                    // Nếu không có hình ảnh mới, giữ hình ảnh cũ
                    $processedImages[] = $existingImages[$index] ?? '';
                }
            }
        }
        return $processedImages;
    }

    private function processContent($contents)
    {
        $processedContent = [];
        if (!empty($contents) && is_array($contents)) {
            foreach ($contents as $content) {
                if (is_string($content)) {
                    $processedContent[] = [$content]; // Đảm bảo nội dung là chuỗi
                }
            }
        }
        return $processedContent;
    }



    public function changeVisibility(Request $request)
    {
        $postIds = $request->id;

        if (empty($postIds)) {
            return response()->json(['success' => false, 'message' => 'No posts selected']);
        }

        // Toggle visibility: Nếu public -> private, nếu private -> public
        Post::whereIn('id', $postIds)->update([
            'visibility' => DB::raw('NOT visibility')
        ]);
        return response()->json(['success' => true, 'message' => 'Visibility updated']);
    }


    //Frontend
    public function news()
    {
        //// force user logout
        if ((Session::has('user'))) {
            if (Cookie::get('token_login') !== Auth::user()->token_login) {
                Session::forget('user');
                Cookie::queue(Cookie::forget('token_login'));
                // Session::flash('sessionExpired', 'Your login session has expired, please log in again.');
                return redirect()->route('user.user.logout')->with('sessionExpired', 'Your login session has expired, please log in again.');
            }
            if (!Cookie::has('token_login')) {
                Session::forget('user');
                return redirect()->route('user.user.logout')->with('sessionExpired', 'Your login session has expired, please log in again.');
            }
        }
        //// End force user logout

        //// innit header data
        if (!Cookie::has('cart')) {
            Cookie::queue('cart', serialize([]), 60 * 24 * 30);
        };
        $user = null;
        $cartItems = [];
        $dataCart = null;
        if (Session::has('user')) {
            $user = Session::get('user');
            if (
                Cart::where('userId', $user->id)->first()->itemsList !== null
            ) {
                $cartItems = Product::whereIn('id', array_keys(Cart::where('userId', $user->id)->first()->itemsList))->get();
            }
            $dataCart = Cart::where('userId', $user->id)->first()->itemsList;
        }
        $data = [
            'pageTitle' => 'Shop',
            'categories' => Category::all(),
            'admins' => Admin::all(),
            'cartItems' => $cartItems,
            'user' => $user,
            'cart' => $dataCart,
        ];
        if (Cookie::get('cart') && !Session::has('user')) {
            // dd(unserialize(Cookie::get('cart')));
            $data['cartItems'] =  Product::whereIn('id', array_keys(unserialize(Cookie::get('cart'))))->get();
            $data['cart'] = unserialize(Cookie::get('cart'));
        };
        //// End innit header data

        $data['posts'] = Post::where('visibility', 1)->latest()->paginate(6);
        return view('front.pages.post.all-posts', $data);
    }

    public function singleNews($id)
    {

        //// force user logout
        if ((Session::has('user'))) {
            if (Cookie::get('token_login') !== Auth::user()->token_login) {
                Session::forget('user');
                Cookie::queue(Cookie::forget('token_login'));
                // Session::flash('sessionExpired', 'Your login session has expired, please log in again.');
                return redirect()->route('user.user.logout')->with('sessionExpired', 'Your login session has expired, please log in again.');
            }
            if (!Cookie::has('token_login')) {
                Session::forget('user');
                return redirect()->route('user.user.logout')->with('sessionExpired', 'Your login session has expired, please log in again.');
            }
        }
        //// End force user logout

        //// innit header data
        if (!Cookie::has('cart')) {
            Cookie::queue('cart', serialize([]), 60 * 24 * 30);
        };
        $user = null;
        $cartItems = [];
        $dataCart = null;
        if (Session::has('user')) {
            $user = Session::get('user');
            if (
                Cart::where('userId', $user->id)->first()->itemsList !== null
            ) {
                $cartItems = Product::whereIn('id', array_keys(Cart::where('userId', $user->id)->first()->itemsList))->get();
            }
            $dataCart = Cart::where('userId', $user->id)->first()->itemsList;
        }
        $data = [
            'pageTitle' => 'Shop',
            'categories' => Category::all(),
            'products' =>  Product::orderBy('created_at', 'desc')->take(5)->get(),
            'cartItems' => $cartItems,
            'user' => $user,
            'cart' => $dataCart,
            'currentPost' => Post::where('id', $id)->where('visibility', 1)->firstOrFail(),
            'recentPosts' => Post::where('visibility', 1)
                ->where('id', '!=', $id) // Tránh trùng bài viết hiện tại
                ->orderBy('created_at', 'desc')
                ->take(4)
                ->get(),
        ];
        if (Cookie::get('cart') && !Session::has('user')) {
            // dd(unserialize(Cookie::get('cart')));
            $data['cartItems'] =  Product::whereIn('id', array_keys(unserialize(Cookie::get('cart'))))->get();
            $data['cart'] = unserialize(Cookie::get('cart'));
        };
        //// End innit header data

        // $products = Product::orderBy('created_at', 'desc')->take(5)->get(); // Lấy 5 sản phẩm mới nhất

        // $currentPost = Post::where('id', $id)
        //     ->where('visibility', 1)
        //     ->firstOrFail();

        // $recentPosts = Post::where('visibility', 1)
        //     ->where('id', '!=', $id) // Tránh trùng bài viết hiện tại
        //     ->orderBy('created_at', 'desc')
        //     ->take(3)
        //     ->get();
        // $posts = Post::where('id', $id)->where('visibility', 1)->orderBy('created_at', 'desc')->take(5)->get();

        // if (!$posts) {
        //     abort(404); // Nếu không tìm thấy bài viết, trả về trang 404
        // }

        return view('front.pages.post.single-post', $data);
    }

    public function postsByTag($tag)
    {
        $posts = Post::where('tags', 'LIKE', "%$tag%")->paginate(10);

        return view('front.pages.post.tag-posts', compact('tag', 'posts'));
    }
}

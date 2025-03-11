<?php

namespace App\Http\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use PHPUnit\Framework\MockObject\Rule\Parameters;

class ProductsController extends Controller
{

    public function index(Request $request)
    {
        ////Apply multiple search, sort, filter
        $query = Product::query();
        if (isset($request->orderByFil) && ($request->orderByFil != null)) {
            switch ($request->orderByFil) {
                case 1:
                    $query->orderBy('proStock', 'asc');
                    break;
                case 2:
                    $query->orderBy('proStock', 'desc');
                    break;
                case 3:
                    $query->orderBy('proActive', 'desc');
                    break;
                case 4:
                    $query->orderBy('proActive', 'asc');
                    break;
                default:
                    $query->orderBy('proId', 'asc');
                    break;
            }
        }
        if (isset($request->nameFil) && ($request->nameFil != null)) {
            $query->where('proName', 'like', '%' . $request->nameFil . '%');
        }
        if (isset($request->categoryFil) && ($request->categoryFil != 0)) {
            $query->where('category_id', $request->categoryFil);
        }
        if (isset($request->seasonFil) && ($request->seasonFil != null)) {
            $query->where('proSeason', $request->seasonFil);
        }
        $result = $query->with('category')->paginate(perPage: 2);
        $data = [
            'pageTitle' => 'Products Manager',
            'products' => $result,
            'categories' => Category::all(),
        ];
        return view('back.pages.products.admin.index', $data);
    }

    public function changeStatus(Product $product)
    {
        //// change single product status (not in use right now)
        $product->proActive = !$product->proActive;
        $product->save();
        // return back();
        return back()->with('success', 'Status has been updated');
    }


    public function resetFilter()
    {
        //// return back to route index to clear URL parameters
        return redirect()->route('admin.products.index');
    }
    public function create()
    {
        //// return view create (not in use right now, using in-place modal in view('index'))
        $data = [
            'pageTitle' => 'Add new product',
            'categories' => Category::all(),
        ];
        return view('back.pages.products.admin.create', $data);
    }
    public function store(Request $request)
    {
        // dd($request);
        if ($request->proPrice < $request->proCost) {
            return redirect()->back()->with('fail', 'Price must be greater than cost');
        }

        //// validate infos
        $resulstAdd = $request->validate([
            'proName' => 'required|min:3|max:255|unique:products,proName',
            'proCost' => 'required|numeric|min:0.01|max:1000000',
            'proPrice' => 'required|numeric|min:0.01|max:1000000',
            'proSeason' => 'required',
            'proOrigin' => 'required',
            'proStock' => 'required|numeric|min:1|max:1000000',
            'proDiscount' => 'required|numeric|min:0|max:100',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|array',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'proDescription' => 'required|string|min:1|max:20000',
        ]);
        // dd('toi day roi');
        $resulstAdd['proSaleStatus'] = 1;
        $resulstAdd['proActive'] = 1;
        $imagesURL = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                // remove white space in name
                $imagePath = time() . '_' . str_replace(' ', '', $image->getClientOriginalName());
                $image->move(public_path('storage/products'), $imagePath);
                array_push($imagesURL, $imagePath);
            }
        }
        $resulstAdd['proImageURL'] = $imagesURL;

        //// create product
        Product::create($resulstAdd);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.products.index')->with('fail', 'Found no product with id ' . $id);
        }
        $data = [
            'product' => $product,
            'categories' => Category::all(),
        ];
        return view('back.pages.products.admin.edit', $data);
    }

    public function update(Request $request, Product $product)
    {
        // ensure cost < price
        if ($request->proCost > $request->proPrice) {
            return redirect()->back()->with('fail', 'Price must be greater than cost');
        }

        // validate infos
        $resulstUpdate = $request->validate([
            'proName' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('products', 'proName')->ignore($product->id)
            ],
            'proCost' => 'required|numeric|min:0.0|max:1000000',
            'proPrice' => 'required|numeric|min:0.0|max:1000000',
            'proSeason' => 'required',
            'proOrigin' => 'required',
            'proStock' => 'required|numeric|min:1|max:1000000',
            'proDiscount' => 'required|numeric|min:0|max:100',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'proDescription' => 'required|string|min:1|max:20000',
        ]);
        $imagesURL = $product->proImageURL;
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                // remove white space in name
                $imagePath = time() . '_' . str_replace(' ', '', $image->getClientOriginalName());
                $image->move(public_path('storage/products'), $imagePath);
                array_push($imagesURL, $imagePath);
            }
        }
        $resulstUpdate['proImageURL'] = $imagesURL;

        // update product
        $product->update($resulstUpdate);

        return redirect()->route('admin.products.index')->with('success', 'Product edited successfully');
    }

    public function proTableActions(Request $request)
    {
        switch ($request->input('action')) {
            case 'reStock':
                $restockValue = $request->restockValue;
                // ensure restockvalue > 0
                if ($restockValue <= 0) {
                    return back()->with('fail', 'Restock value must be greater than 0!');
                }

                if ($request->selected_id != null) {
                    Product::whereIn('id', $request->selected_id)->increment('proStock', $restockValue);
                    return back()->with('success', 'Selected products have been deactivated');
                } else {
                    return back()->with('fail', 'no product(s) selected!');
                }
            case 'deactive':
                if ($request->selected_id != null) {
                    Product::whereIn('id', $request->selected_id)->update(['proActive' => 0]);
                    return back()->with('success', 'Selected products have been deactivated');
                } else {
                    return back()->with('fail', 'no product(s) selected!');
                }
            case 'active':
                if ($request->selected_id != null) {
                    Product::whereIn('id', $request->selected_id)->update(['proActive' => 1]);
                    return back()->with('success', 'Selected products have been deactivated');
                } else {
                    return back()->with('fail', 'no product(s) selected!');
                }
        }
    }

    public function ImageRemove($id, $image)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.products.index')->with('fail', 'Found no product with id ' . $id);
        }
        $oldImages = $product->proImageURL;
        $index = array_search($image, $oldImages);
        if ($index !== false) {
            unset($oldImages[$index]);
        } else {
            return back()->with('fail', 'Image not found in product images');
        }
        $newImages = array_values($oldImages);
        $product->proImageURL = $newImages;
        $product->save();
        Storage::disk('public')->delete('products/' . $image);

        return response()->json([
            'message' => 'Image remove successfully',
        ]);
    }
    public function ImageSetMain($id, $image)
    {
        //// change index of image to set main image
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->back()->with('fail', 'Found no product with id ' . $id);
        }
        $oldImages = $product->proImageURL;
        $index = array_search($image, $oldImages);
        if ($index !== false) {
            $firstImage = $oldImages[0];
            $oldImages[0] = $image;
            $oldImages[$index] = $firstImage;
        } else {
            return back()->with('fail', 'Image not found in product images');
        }
        $product->proImageURL = $oldImages;
        $product->save();

        return response()->json([
            'message' => 'Image set as main successfully',
        ]);
    }
}

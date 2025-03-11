<?php

namespace App\Http\Frontend\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;
use App\Mail\ContactFormMail;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index()
    {
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
            'pageTitle' =>  'Contact',
            'categories' => Category::all(),
            'cartItems' => $cartItems,
            'user' => $user,
            'cart' => $dataCart,
        ];
        if (Cookie::get('cart') && !Session::has('user')) {
            // dd(unserialize(Cookie::get('cart')));
            $data['cartItems'] =  Product::whereIn('id', array_keys(unserialize(Cookie::get('cart'))))->get();
            $data['cart'] = unserialize(Cookie::get('cart'));
        };
        $subject = [
            'order' => 'Order',
            'product' => 'Product Information',
            'support' => 'Customer Service',
            'other' => 'Other',
        ];

        $contacts = Contact::all();
        return view("front.contact.index", $data, compact("contacts", 'subject'));
    }
    public function index1(Request $request)
    {
        $data = [
            'pageTitle' => 'Contact',
        ];
        $query = Contact::query();

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        if ($request->has('subject') && $request->subject != '') {
            $query->where('subject', $request->subject);
        }

        $search = $request->input('search');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('message', 'LIKE', '%' . $search . '%');
            });
        }
        $contacts = $query->paginate(10)->appends(request()->query());

        return view("back.pages.contact.index1", $data, compact("contacts"));
    }

    public function create()
    {
        $data = [
            'pageTitle' => 'Contact',
        ];
        $contacts = Contact::all();
        return view("front.pages.contact.index", $data, compact("contacts"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email',
            'phone' => 'required|string|min:10|max:16',

            'subject' => 'required',
            'message' => 'required|string|min:1|max:100'
        ]);
        //dd($request->all());
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);
        //dd($request->all());
        return back()->with('notice', 'Thank you for contacting us!!!');
    }

    public function detail($id)
    {
        $contact = Contact::findOrFail($id);
        return response()->json($contact);
    }

    public function reply($id)
    {
        $data = [
            'pageTitle' => 'Contact Reply',
        ];
        $contacts = Contact::find($id);
        return view('back.pages.contact.reply', $data, compact('contacts'));
    }

    public function sendEmail(Request $request, Contact $contacts)
    {
        $pageTitle = 'Contact';
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|email',
            'phone' => 'required|numeric',
            'subject' => 'required',
            'message' => 'required',
            'reply' => 'required'
        ]);

        $contacts->update([
            'reply' => $request->reply,
            'status' => '1'
        ]);


        $data = [
            'title' => 'Answer your question',
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'reply' => $request->reply

        ];
        Mail::to($request->email)->send(new ContactFormMail($data));
        return redirect()->route('admin.contact.index1')->with('message', 'Email was sent successfully');
    }
}

<?php

namespace App\Http\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $subject = [
            'order' => 'Order',
            'product' => 'Product Information',
            'support' => 'Customer Service',
            'other' => 'Other',
        ];
        $data = [
            'pageTitle' => 'Contact',
        ];
        $contacts = Contact::all();
        return view("front.pages.contact.index", $data, compact("contacts",'subject'));
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
        $contacts =$query->paginate(10)->appends(request()->query());
        
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
        // $contacts = Contact::all();
        // $data = [
        //     'pageTitle' => 'Contact',
        // ];
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|email',
            'phone' => 'required|numeric',
            'subject' => 'required',
            'message' => 'required'
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

    public function reply($id){
        $contacts=Contact::find($id);
        return view('back.pages.contact.reply', compact('contacts'));
    
    }

    public function sendEmail(Request $request,Contact $contacts )
    {
        $pageTitle ='Contact';
        $request->validate([  
            'name' => 'required',
            'email' => 'required|string|email',
            'phone' => 'required|numeric',
            'subject' => 'required',
            'message' => 'required',        
            'reply' => 'required'
        ]);
               
        $contacts->update([
           'reply'=>$request->reply,
           'status'=>'1'
        ]);
 
      
        $data = [
            'title' => 'Answer your question',
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'reply'=>$request->reply

        ];      
        Mail::to($request->email)->send(new ContactFormMail($data));
       return redirect()->route('admin.contact.index1')->with('message', 'Email was sent successfully');
    }
}

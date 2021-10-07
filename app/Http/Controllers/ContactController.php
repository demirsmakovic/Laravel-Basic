<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{

    public function ContactInfo()
    {
        $contact = Contact::latest()->get();

        return view('admin.contact.index', compact('contact'));
    }

    public function AddContactInfo(Request $request)
    {
    $request->validate([
        'address' => 'required',
        'email' => 'required',
        'phone' => 'required',
    ]);

    Contact::insert([
        'address' => $request->address,
        'email' => $request->email,
        'phone' => $request->phone,
        'created_at' => Carbon::now()
        ]);

    return Redirect()->back()->with('succes','Contact Info inserted successfull');
    
}

     public function Edit($id){
        $con = Contact::find($id);
        return view('admin.contact.edit', compact('con'));

    }

    public function Update(Request $request, $id)
    {
    $request->validate([
        'address' => 'required',
        'email' => 'required',
        'phone' => 'required',
    ]);

    Contact::find($id)->update([
        'address' => $request->address,
        'email' => $request->email,
        'phone' => $request->phone,
        ]);

    return Redirect()->route('contact.info')->with('succes','Contact Info Updated Successfull');
    
}

    public function ContactMsg()
    {
        $messages = ContactForm::all();

        return view('admin.contact.messages', compact('messages'));
    }

    public function SendMessage(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'email' => 'required',
        'subject' => 'required',
        'message' => 'required',
    ]);

        ContactForm::insert([
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,
        'created_at' => Carbon::now()
        ]);

        

    return Redirect()->back()->with('succes','Message sent successfull');
    }

    public function DeleteMessage($id)
    {
        ContactForm::find($id)->delete();
        return Redirect()->back()->with('succes','Message Delete Successfully');
    }
}

<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ReplayContactMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderByDesc('id')->where('status' , 'pending')->latest()->get();
        return view('admin.pages.contacts.index' , compact('contacts'));
    }

    public function old()
    {
        $contacts = Contact::orderByDesc('id')->where('status' , 'completed')->get();
        return view('admin.pages.contacts.old' , compact('contacts'));
    }

    public function replay(Contact $contact)
    {
        return view('admin.pages.contacts.repaly' , compact('contact'));

    }
    public function sendReplay(Request $request)
    {

        Mail::to($request->email)->send(new ReplayContactMail($request));
        $contact = Contact::findOrFail($request->id);
        $contact->update([
            'status'=>'completed',
        ]);

        session()->flash('success' , 'تم ارسال الرد بنجاح');
        return redirect()->route('admin.contacts.index');
    }

    public function delete($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        session()->flash('success' , 'تم الحذف  بنجاح');
        return redirect()->route('admin.contacts.old');
    }
    public function deleteAll()
    {
        $completed_contacts = Contact::where('status' , 'completed')->get();
        foreach($completed_contacts as $contact){
            $contact->delete();
        }

        session()->flash('success' , 'تم حذف  جميع عمليات التواصل المكتمله');
        return redirect()->route('admin.contacts.old');
    }
}

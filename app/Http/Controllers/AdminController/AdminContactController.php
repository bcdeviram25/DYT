<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    //

    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('admin.contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_no' => 'required|string|max:15',
        ]);

        Contact::create([
            'address' => $request->address,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'status' => true,
        ]);

        return redirect()->route('admin.contacts.index');
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $request->validate([
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_no' => 'required|string|max:15',
        ]);

        $contact->address = $request->address;
        $contact->email = $request->email;
        $contact->phone_no = $request->phone_no;
        $contact->save();

        return redirect()->route('admin.contacts.index');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('admin.contacts.index');
    }

    public function toggleStatus($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->status = !$contact->status;
        $contact->save();
        return redirect()->route('admin.contacts.index');
    }
}

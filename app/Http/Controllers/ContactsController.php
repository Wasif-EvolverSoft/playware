<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class   ContactsController extends Controller
{
  
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

 
    public function create()
    {
        return view('contacts.create');
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'contact_heading' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|unique:contacts',
            'contact_email' => 'nullable|email|unique:contacts',
            'contact_paragraph' => 'nullable|string'
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    }

    
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

   
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'contact_heading' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|unique:contacts,contact_number,' . $contact->id,
            'contact_email' => 'nullable|email|unique:contacts,contact_email,' . $contact->id,
            'contact_paragraph' => 'nullable|string'
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}

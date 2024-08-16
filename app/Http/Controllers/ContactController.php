<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Contact;
class ContactController extends Controller
{




    public function index(Request $request)
    {
        $contacts = Contact::latest();

        if ($request->has('sort')) {
            $contacts = $contacts->orderBy($request->input('sort'), $request->input('direction'));
        }

        if ($request->has('search')) {
            $contacts = $contacts->where('name', 'like', '%' . $request->input('search') . '%')
                ->orWhere('email', 'like', '%' . $request->input('search') . '%');
        }

        return view('index', ['contacts' => $contacts->paginate(10)]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index');
    }

    public function show(Contact $contact)
    {
        return view('show', ['contact' => $contact]);
    }

    public function edit(Contact $contact)
    {
        return view('edit', ['contact' => $contact]);
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index');
    }









}

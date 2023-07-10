<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;
use Tests\Fixtures\Model;

class ContactController extends Controller
{
    public function  index(){
        $companies = Company::LoadingOption();
        $contacts=Contact::LatestFirst()->paginate(5);
        return view("contacts.index",compact('contacts', 'companies'));
    }

    public  function create(){
        $contact = new Contact();
        $companies = Company::LoadingOption();
        return view("contacts.create", compact('companies','contact'));
    }

    public function show($id){
        $contact = Contact::findOrFail($id);
        return view("contacts.show", compact( 'contact'));
    }

    public function store(Request $request){
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'address'=>'required',
            'company_id'=>'required|exists:companies,id',
        ]);
        $result = Contact::create($request->all());
        if($result){
            return redirect()->route('contact.index')->with('message', 'Contact Insert Successfully');
        }
        else{
            return 0;
        }
    }

    public function update($id,Request $request){
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'address'=>'required',
            'company_id'=>'required|exists:companies,id',
        ]);
        $contact = Contact::findOrFail($id);
        $result = $contact->update($request->all());
        if($result){
            return redirect()->route('contact.index')->with('message', 'Contact Updated Successfully');
        }
        else{
            return 0;
        }
    }
    public function edit($id) {
        $contact = Contact::findOrFail($id);
        $companies = Company::LoadingOption();
        return view("contacts.edit", compact('companies', 'contact'));
    }

    public function destroy($id) {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return back()->with('message', "Contact has been Deleted Successfully");
    }
}












<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index() {
        $categories = Category::all();

        return view ('index', compact('categories'));
    }

    public function confirm(ContactRequest $request){
        $inputs = $request->all();

        $contact = new Contact($request->all());
        $contact['tel'] = $request->tel1 . $request->tel2 . $request->tel3;

        $categories = Category::all();

        return view('confirm', compact('contact', 'inputs', 'categories'));
    }

    public function back(Request $request){
        return redirect('/')->withInput($request->all());
    }
    
    public function store(ContactRequest $request){
        $contact = $request->all();
        $contact['tel'] = $request->tel1 . $request->tel2 . $request->tel3;
        Contact::create($contact);

        return view('thanks');
    }
}

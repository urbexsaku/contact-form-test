<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ContactController extends Controller
{
    public function index(Request $request) {
        $categories = Category::all();
        $contact = $request->all();

        return view ('index', compact('categories', 'contact'));
    }

    public function confirm(Request $request){
        $contact = $request->all();
        $categories = Category::all();

        return view('confirm', compact('contact', 'categories'));
    }

    public function store(Request $request){
        $contact = $request->all();
        Contact::create($contact);

        return view('thanks');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index(){
        $contacts = Contact::Paginate(7);
        $categories = Category::all();
        return view('admin.admin', ['contacts' => $contacts]);
    }

    public function search(Request $request){
        $contacts = Contact::with('category')->GenderSearch($request->gender)->CategorySearch($request->category_id)->DateSearch($request->date)->KeywordSearch($request->keyword)->get();
        $categories = Category::all();

        return view('index',compact('contacts', 'categories'));
    }
}

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
        return view('admin.admin', compact('contacts', 'categories'));
    }

    public function search(Request $request){
        $contacts = Contact::with('category')->GenderSearch($request->gender)->CategorySearch($request->category_id)->DateSearch($request->date)->KeywordSearch($request->keyword)->paginate(7)->appends($request->query());
        $categories = Category::all();

        return view('admin.admin',compact('contacts', 'categories'));
    }

    public function reset(){
        return redirect('/admin');
    }
}

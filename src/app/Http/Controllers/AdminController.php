<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index(){
        $contacts = Contact::simplePaginate(7);
        $categories = Category::all();
        return view('admin.admin', ['contacts' => $contacts]);
    }

}

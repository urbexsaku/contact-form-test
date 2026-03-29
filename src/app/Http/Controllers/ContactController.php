<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
     {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $inputs = $request->all(); //修正ボタンで戻る際にtel 3枠に分けるためにinput使用
        $contact = new Contact($request->all()); //gender_text適用するためにモデル使用
        $contact['tel'] = $request->tel1 . $request->tel2 . $request->tel3; 
        return view('confirm', compact('contact', 'inputs'));
    }

    public function back(Request $request)
    {
        return redirect('/')->withInput($request->all());
    }
   
    public function store(ContactRequest $request){
        $contact = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'tel' => $request->tel1 . $request->tel2 . $request->tel3,
            'address' => $request->address,
            'building' => $request->building,
            'detail' => $request->detail,
            'category_id' => $request->category_id,
        ];

        Contact::create($contact);
        return redirect('/thanks');
    }
}

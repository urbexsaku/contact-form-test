<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

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

    public function destroy(Request $request){
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }

    public function export(Request $request){
        $contacts = Contact::with('category')->GenderSearch($request->gender)->CategorySearch($request->category_id)->DateSearch($request->date)->KeywordSearch($request->keyword)->get();

        $filename = 'contacts.csv';

        $stream = fopen('php://temp', 'r+');
        fwrite($stream, "\xEF\xBB\xBF");

        fputcsv($stream,[
            'お名前',
            '性別',
            'メールアドレス',
            '電話番号',
            '住所',
            '建物名',
            'お問い合わせの種類',
            'お問い合わせ内容'
        ]);

        foreach ($contacts as $contact){
            fputcsv($stream, [
                $contact->last_name . ' ' . $contact->first_name,
                $contact->gender_text,
                $contact->email,
                $contact->tel,
                $contact->address,
                $contact->building,
                $contact->category_text,
                $contact->detail
            ]);
        }

        rewind($stream);

        return response (stream_get_contents($stream),200,[
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
        ]);

      }

}
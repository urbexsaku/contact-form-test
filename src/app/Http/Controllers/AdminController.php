<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(7); //ページネーション
        $categories = Category::all();
        return view('admin.admin', compact('contacts', 'categories'));
    }

    public function search(Request $request)
    {

        if ($request->has('reset')) { //リセットボタン用リダイレクト
            return redirect('/admin')->withInput();
        }

        $contacts = Contact::with('category')
        ->GenderSearch($request->gender)
        ->CategorySearch($request->category_id)
        ->DateSearch($request->date)
        ->KeywordSearch($request->keyword)
        ->paginate(7) //検索結果もページネーションを適用
        ->appends($request->query()); //検索条件を保持

        $categories = Category::all();

        return view('admin.admin', compact('contacts', 'categories'));
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect('/admin');
    }

    public function export(Request $request)
    {
        $contacts = Contact::with('category')
        ->GenderSearch($request->gender)
        ->CategorySearch($request->category_id)
        ->DateSearch($request->date)
        ->KeywordSearch($request->keyword)
        ->get();

        $filename = 'contacts.csv';

        $stream = fopen('php://temp', 'r+'); //メモリ上にCSV作成
        fwrite($stream, "\xEF\xBB\xBF");

        fputcsv($stream,[ //ヘッダー行を作成
            'お名前',
            '性別',
            'メールアドレス',
            '電話番号',
            '住所',
            '建物名',
            'お問い合わせの種類',
            'お問い合わせ内容'
        ]);

        foreach ($contacts as $contact){ //データ書き込み
            fputcsv($stream, [
                $contact->last_name . '　' . $contact->first_name,
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

        return response (stream_get_contents($stream),200,[ //ダウンロード
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
        ]);

      }

}
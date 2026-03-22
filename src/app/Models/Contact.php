<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
        'category_id'
    ];

    public function getGenderTextAttribute(){
        return [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ][$this->gender];
    }

    public function getCategoryTextAttribute(){
        return [
            1 => '商品のお届けについて',
            2 => '商品の交換について',
            3 => '商品トラブル',
            4 => 'ショップへのお問い合わせ',
            5 => 'その他',
        ][$this->category_id];
    }
}

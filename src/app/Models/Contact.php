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

    public function categories(){
        return $this->belongsTo('Category::class');
    }

    public function scopeGenderSearch($query, $gender){
        if (!empty($gender)){
            $query->where('gender', $gender);
        }
        return $query;
    }

    public function scopeCategorySearch($query, $category_id){
        if (!empty($category_id)){
            $query->where('ccategory_id', $category_id);
        }
        return $query;
    }

    public function scopeDateSearch($query, $date){
        if (!empty($date)){
            $query->where('created_at', $date);
        }
        return $query;
    }

    public function scopeKeywordSearch($query, $keyword){
        if (!empty($keyword)){
            $query->where(function ($query) use ($keyword){
                $query->where('last_name', 'like', '%' . $keyword . '%')
                ->orWhere('first_name', 'like', '%' . $keyword . '%')
                ->orWhere("CONCAT(last_name, first_name) LIKE ?", ['%' . $keyword . '%'])
                >orWhere('email', 'like', '%' . $keyword . '%');
            });
            return $query;
        }
    }
}

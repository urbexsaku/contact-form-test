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
        return $this->category->content ?? '';
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopeGenderSearch($query, $gender){
        if (!empty($gender)){
            $query->where('gender', $gender);
        }
        return $query;
    }

    public function scopeCategorySearch($query, $category_id){
        if (!empty($category_id)){
            $query->where('category_id', $category_id);
        }
        return $query;
    }

    public function scopeDateSearch($query, $date){
        if (!empty($date)){
            $query->whereDate('created_at', $date); //created_atには時間も含まれるため、whereDateで日付のみ検索
        }
        return $query;
    }

    public function scopeKeywordSearch($query, $keyword){
        if (!empty($keyword)){
            $query->where(function ($query) use ($keyword){
                $query->where('last_name', 'like', '%' . $keyword . '%')
                ->orWhere('first_name', 'like', '%' . $keyword . '%')
                ->orWhereRaw("CONCAT(last_name, first_name) LIKE ?", ['%' . $keyword . '%'])
                ->orWhere('email', 'like', '%' . $keyword . '%');
            });
            
        }
        return $query;
    }
}

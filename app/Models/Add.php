<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Add extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'price',
        'category_id'
    ];
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    static public function ToBeRevisionedCount(){
        return Add::where('is_accepted',null)->count();
    }
}

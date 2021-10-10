<?php

namespace App\Models;

use App\Models\User;
use App\Models\Images;
use App\Models\Category;
use App\Models\AddImages;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Add extends Model
{
    use HasFactory;
    use Searchable;

    public function toSearchableArray(){
        // $categories = $this->category->pluck('category_id')->join(', ');
        $array = [ 
            'id' => $this->id,            
            'title' => $this->title,
            'description' => $this->description,   
            'category'=>$this->category->name
        ];
        return $array;
    }
    
    protected $fillable = [
        'title',
        'description',
        'price',
        'category_id', 
        'user_id'
    ];
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function images(){
        return $this->hasMany(Images::class);
    }
    
    static public function ToBeRevisionedCount(){
        return Add::where('is_accepted',null)->count();
    }
}

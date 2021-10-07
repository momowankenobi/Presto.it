<?php

namespace App\Models;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

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

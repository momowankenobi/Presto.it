<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $fillable = [
        'file',
        'add_id'
    ];
    public function add(){
        return $this->belongsTo(Add::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    static public function getUrlByFilePath($filePath, $w=null, $h=null){

        if(!$w && !$h){

            return Storage::url($filePath);

        }

        $path=dirname($filePath);
        $filename=basename($filePath);
        $file="{$path}/crop{$w}x{$h}_{$filename}";

        return Storage::url($file);

    }


    public function getUrl($w=null, $h=null){

        return Images::getUrlByFilePath($this->file, $w, $h);

    }


}

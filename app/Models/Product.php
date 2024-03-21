<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getAbstract($chars = 60){
        $_description = $this->description;
    
       return strlen($_description) < $chars ? $_description : substr($_description, 0, $chars) . " [...]" ;
 
    }
}
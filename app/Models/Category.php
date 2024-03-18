<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function products(){
        return $this->hasMany(Product::class);
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => "<span class='py-1 px-2 rounded-pill' style='background-color: {$this->color}'>{$value}</span>",
        );
    }
}

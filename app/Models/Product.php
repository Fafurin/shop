<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;

    protected $table = 'products';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_products', 'product_id', 'color_id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }


    // для тестирования (картинки из web)
    public function getImageUrlAttribute()
    {
        return url($this->preview_image);
    }

    // этот метод получает url из storage
    // public function getImageUrlAttribute()
    // {
    //     return url('storage/' . $this->preview_image);
    // }


}

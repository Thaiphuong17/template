<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'show_at_nav',
        'status',
    ];
    public function news()
    {
        return $this->hasMany(News::class, 'category_id'); // Giả sử cột khóa ngoại là 'category_id'
    }
}

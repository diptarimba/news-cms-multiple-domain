<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory, HasUuids;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'title',
        'content',
        'category_id',
        'author_id',
        'posted_at',
        'slug',
    ];

    protected $dates = ['posted_at'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}

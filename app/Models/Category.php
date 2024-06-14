<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, HasUuids;
    protected $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];

    public function contents()
    {
        return $this->hasMany(Content::class, 'category_id', 'id');
    }
}

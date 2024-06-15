<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class URLMapping extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['sub', 'domain', 'name', 'code'];
}

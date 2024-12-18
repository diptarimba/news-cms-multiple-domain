<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class URLMapping extends Model
{
    use HasFactory, HasUuids;
    protected $primaryKey = 'id';

    protected $fillable = ['sub', 'domain', 'name', 'code'];

    public function contents()
    {
        return $this->belongsToMany(Content::class, 'domain_content', 'domain_uuid', 'content_uuid')
                    ->withTimestamps()->withPivot('slug', 'posted_at', 'code');
    }
}

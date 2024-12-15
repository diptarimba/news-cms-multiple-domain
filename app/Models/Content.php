<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Content extends Model
{
    use HasFactory, HasUuids;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'title',
        'content',
        'code',
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

    public function getImageAttribute()
    {
        if (preg_match('/<img.*?src="(.*?)"/', $this->content, $matches)) {
            return $this->image = $matches[1];
        }

        return null;
    }

    public function getSpoilerAttribute()
    {
        $content = $this->content;
        $text = strip_tags($content, '<br>'); // Menghapus semua tag HTML kecuali <br>
        $text = preg_replace('/<br>/', '. ', $text); // Mengganti &quot; menjadi "
        $text = preg_replace('/&quot;/', '"', $text); // Mengganti &quot; menjadi "
        $text = preg_replace('/&nbsp;/', ' ', $text); // Mengganti &quot; menjadi "
        return Str::limit($text, 200); // Mengambil 200 karakter pertama sebagai spoiler
    }

    public function domain()
    {
        return $this->belongsToMany(URLMapping::class, 'domain_content', 'content_uuid', 'domain_uuid')
                    ->withTimestamps();
    }
}

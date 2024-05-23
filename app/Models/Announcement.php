<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'thumbnail', 'content','language', 'active', 'published_at'];

    protected $casts = [
        'published_at' => 'datetime'
    ];

    public function shortBody($words = 30): string
    {
        return Str::words(strip_tags($this->content), $words);
    }

    public function getThumbnail()
    {
        if (str_starts_with($this->thumbnail, 'http')) {
            return $this->thumbnail;
        }

        return '/storage/' . $this->thumbnail;
    }
}

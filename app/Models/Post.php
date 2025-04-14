<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'poster'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getPosterUrlAttribute()
    {
        if (!$this->poster) {
            return 'https://via.placeholder.com/800x400';
        }
        return asset('storage/posters/' . $this->poster);
    }

    public function deletePoster()
    {
        if ($this->poster && Storage::disk('posters')->exists($this->poster)) {
            Storage::disk('posters')->delete($this->poster);
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'likes_count', 'favorites_count', 'is_available'];

    public function borrowing(): BelongsTo
    {
        return $this->belongsTo(Borrowing::class);
    }

    public function likedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'book_likes');
    }

    public function favouredUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'book_favorites');
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'description', 'cover_path', 'category_id'];

    public function borrowings(): HasMany
    {
        return $this->hasMany(Borrowing::class);
    }

    public function currentBorrowing(): HasOne
    {
        return $this->hasOne(Borrowing::class)->whereNull('returned_at');
    }

    public function getStatusAttribute()
    {
        if (!$this->currentBorrowing) {
            return 'available';
        }

        return now()->greaterThan($this->currentBorrowing->due_date)
            ? 'overdue'
            : 'borrowed';
    }

    public function likedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'book_likes');
    }

    public function dislikedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'book_dislikes');
    }

    public function savedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'book_saves');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeOverdue(Builder $query)
    {
        $query->whereHas('currentBorrowing', function ($e) {
            $e->where('due_date', '<', now());
        });
    }

    public function scopePopular(Builder $query)
    {
        $query->withCount("likedByUsers")->orderBy("liked_by_users_count", "desc");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chirp extends Model
{
    use HasFactory;

    protected $fillable = ['message'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function likes_count(): int
    {
        return $this->likes()->count();
    }

    public function isLikedBy(User $user): bool
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function like(): int
    {
        $count = $this->likes()->count();
        if (! $this->isLikedBy(auth()->user())) {
            $this->likes()->create(['user_id' => auth()->user()->id]);
            $count++;
        }

        return $count;
    }

    public function dislike(): int
    {
        $count = $this->likes()->count();
        if ($this->isLikedBy(auth()->user())) {
            $this->likes()->where('user_id', auth()->user()->id)->delete();
            $count--;
        }

        return $count;
    }
}

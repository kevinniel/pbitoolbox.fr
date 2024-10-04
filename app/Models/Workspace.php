<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Workspace extends Model
{
    use HasFactory;

    protected $fillable = [
        'workspaces_id',
        'uuid',
        'name',
        'slug',
        'can_access_comment',
        'can_access_image',
        'can_access_stat',
    ];

    protected $casts = [
        'can_access_comment' => 'boolean',
        'can_access_image' => 'boolean',
        'can_access_stat' => 'boolean',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function stats(): HasMany
    {
        return $this->hasMany(Stat::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stat extends Model
{
    protected $fillable = [
        'stats_id',
        'report',
        'tab',
        'additionalFields',
        'remoteAddr',
        'httpAcceptLanguage',
        'httpUserAgent',
        'httpSecChUa',
        'httpSecChUaPlatform',
        'userId',
        'workspace',
        'workspace_id',
    ];

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(Workspace::class);
    }
}

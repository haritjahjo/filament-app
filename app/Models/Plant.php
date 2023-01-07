<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Plant extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function pengusaha(): BelongsTo
    {
        return $this->belongsTo(Plant::class);
    }
}

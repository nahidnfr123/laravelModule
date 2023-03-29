<?php

namespace Modules\Affiliate\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DownLine extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Affiliate\Database\factories\DownLineFactory::new();
    }

    public function referring(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Affiliate::class, 'referring_id', 'id');
    }

    public function referred(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Affiliate::class, 'referred_id', 'id');
    }
}

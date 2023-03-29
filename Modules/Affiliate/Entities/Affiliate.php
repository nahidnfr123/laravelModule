<?php

namespace Modules\Affiliate\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class Affiliate extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected static function newFactory()
    {
        return \Modules\Affiliate\Database\factories\AffiliateFactory::new();
    }
}

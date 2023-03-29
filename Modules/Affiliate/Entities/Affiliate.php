<?php

namespace Modules\Affiliate\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Affiliate extends Authenticatable
{
    use HasFactory, HasRoles;
    use HasRecursiveRelationships;

    protected $fillable = [
        'name',
        'email',
        'password',
        'promo_code',
        'parent_id',
        'commission',
    ];
    protected $guard_name = 'affiliate';

    protected static function newFactory()
    {
        return \Modules\Affiliate\Database\factories\AffiliateFactory::new();
    }

    public function subAffiliates(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(DownLine::class, 'referring_id', 'id');
    }

    public function referrer(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(DownLine::class, 'referrer_id', 'id');
    }
}

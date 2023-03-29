<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\AdminFactory::new();
    }
}

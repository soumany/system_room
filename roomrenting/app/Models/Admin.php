<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Admin extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    // Define other model configurations or relationships if needed
}


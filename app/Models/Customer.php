<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;
class Customer extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticableTrait;
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'photo', 
        'total_earning',
    ];
}

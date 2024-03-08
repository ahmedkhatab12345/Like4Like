<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    protected $fillable = [
        'links',
        'customer_id',
        'type',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

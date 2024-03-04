<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'phone_number',
        'total_earnings',
        'withdrawal_amount',
        'status',
        'methoud',
        'photo',
    ];


    public function customer() 
    {
        return $this->belongsTo(Customer::class);
    }
}

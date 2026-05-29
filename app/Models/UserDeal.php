<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDeal extends Model
{
    protected $table = 'user_deals';

    protected $fillable = [
        'user_id',
        'deal_id',
        'status'
    ];

    // Define the relationship with Deal model
    public function deal()
    {
        return $this->belongsTo(Deal::class, 'deal_id');
    }
}

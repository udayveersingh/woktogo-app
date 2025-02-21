<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'deadline',  // Make sure this is included
        'image',
        'price',
        'code_number',
        'qr_code_path'
    ];

    // Define the relationship with UserDeal model
    public function userDeals()
    {
        return $this->hasMany(UserDeal::class, 'deal_id');
    }
}

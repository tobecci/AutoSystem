<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommissionClaim extends Model
{
    protected $table = 'commclaim';

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'total_amount',
        'lawyer_commission',
        'adjuster_fee',
        'from_lawyer',
    ];


    public function getCreatedAtAttribute($value)
    {
		return date('dMy H:i:s', strtotime($value));
    }

}

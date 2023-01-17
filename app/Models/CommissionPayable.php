<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommissionPayable extends Model
{
    protected $table = 'commpayable';

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'total_amount',
        'adjuster_fee',
        'claim',
        'service_charge',
        'document_fee',
        'comm',
        'deduct_amount',
        'payable_to_workshop'
    ];


    public function getCreatedAtAttribute($value)
    {
		return date('dMy H:i:s', strtotime($value));
    }

}

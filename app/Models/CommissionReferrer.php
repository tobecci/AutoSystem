<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommissionReferrer extends Model
{
    protected $table = 'commcompany';



    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'company_name',
        'referrer_name',
        'commission'
    ];
}

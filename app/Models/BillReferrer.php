<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillReferrer extends Model
{
    use HasFactory;

    protected $table = 'billreferrer';

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'refcompany',
        'refname',
        'refcomm',
        'refpaid',
        'refoutstanding'
    ];

}

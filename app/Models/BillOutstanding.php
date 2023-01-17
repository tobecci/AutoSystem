<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillOutstanding extends Model
{
    use HasFactory;

    protected $table = 'billoutstanding';

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'opayment1',
        'opayment2',
        'opayment3',
        'outstanding'
    ];

}

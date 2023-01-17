<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillBalance extends Model
{
    use HasFactory;

    protected $table = 'billbalance';

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'balreceive1',
        'balreceive2',
        'balreceive3',
        'balance'
    ];

}

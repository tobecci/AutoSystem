<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillTotal extends Model
{
    use HasFactory;

    protected $table = 'billtotal';

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'totaldate',
        'gross',
        'cart',
        'adj',
        'total'
    ];
}

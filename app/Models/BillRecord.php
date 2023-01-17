<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Log;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillRecord extends Model
{
    protected $table = 'billrecord';

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'date',
        'car_no',
        'model',
        'total',
        'cost',
        'profitloss',
        'referrer',
        'ref_fee',
        'outstanding',
        'balance'
    ];

	// Default values
	protected $attributes = [
       'referrer' => 'Referrer'
    ];

    public static function booted()
    {
		static::created(function ($bill_record) {
			$bill_record->referrer = 'Referrer';

			//create an outstanding bill record
			$bill_record->bill_outstanding()->create([
				'billrecord_id' => $bill_record->id
			]);

			$bill_record->bill_total()->createMany([
				['totaldate' => ''],
				['totaldate' => ''],
				['totaldate' => '']
			]);

			$bill_record->bill_balance()->create([
				'billrecord_id' => $bill_record->id
			]);

			$bill_record->bill_referrer()->create([
				'billrecord_id' => $bill_record->id
			]);
		});


		static::deleted(function ($bill_record) {
			info('deleting associated records');
			$bill_outstanding = $bill_record->bill_outstanding;
			$bill_outstanding->delete();

			$bill_balance = $bill_record->bill_balance;
			$bill_balance->delete();

			$bill_referrer =$bill_record->bill_referrer;
			$bill_referrer->delete();

			$bill_total = $bill_record->bill_total;
			info('bill_total', $bill_total->toArray());
			foreach($bill_total as $bill_total_record){
				info('bill total record', $bill_total_record->toArray());
				$bill_total_record->delete();
			}

			info("=================================");
		});
	}

    public function getCreatedAtAttribute($value)
    {
		//Log::debug('getCreatedAttribute: value='.$value);
		return date('dMy H:i:s', strtotime($value));
    }

    public function bill_outstanding()
    {
        return $this->hasOne(BillOutstanding::class, 'billrecord_id');
    }

    public function bill_balance(){
		return $this->hasOne(BillBalance::class, 'billrecord_id');
    }

    public function bill_total()
    {
        return $this->hasMany(BillTotal::class, 'billrecord_id');
    }
    public function bill_referrer()
    {
        return $this->hasOne(BillReferrer::class, 'billrecord_id');
    }
}

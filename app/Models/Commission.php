<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $table = 'commissionrecord';

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'company',
        'car_no',
        'model',
        'claim',
        'checker',
        'commission',
        'payable',
        'status',
    ];

    // Default values
    protected $attributes = [
        'car_no' => 'Car number',
        'company' => 'Company',
    ];

    protected static $foreign_key = 'commrecord_id';

    public static function booted()
    {
        static::created(function ($commission_record) {
            info('commision record has been created');
            info('record=' . json_encode($commission_record));
            self::add_default_car_number($commission_record->id);
            self::create_referrer($commission_record);
            self::create_claim($commission_record);
            self::create_payable($commission_record);
        });

        static::deleted(function ($deleted_commission_record) {
            info("\n\n\n\n\n");
            info('deleting associated records=' . $deleted_commission_record);
            // info('test class' . $test_class);
            self::delete_referrer($deleted_commission_record);
            self::delete_claim($deleted_commission_record);
            self::delete_payable($deleted_commission_record);
            info("\n\n\n\n\n");
        });
    }

    private static function add_default_car_number($id)
    {
        $created_commission_record = Commission::find($id);
        $created_commission_record->push();
    }

    private static function create_referrer($created_commission_record)
    {
        $created_commission_record->commcompany()->create([
            'commrecord_id' => $created_commission_record->id,
            'company_name' => 'Company',
        ]);
        info('crated at=' . json_encode($created_commission_record));
    }

    private static function delete_referrer($deleted_commission_record)
    {
        $deleted_commission_record->commcompany()->delete();
    }

    private static function delete_claim($deleted_commission_record)
    {
        $deleted_commission_record->commclaim()->delete();
    }
    private static function create_claim($created_commission_record)
    {
        $created_commission_record->commclaim()->create([
            'commrecord_id' => $created_commission_record->id,
        ]);
    }

    private static function create_payable($created_commission_record)
    {
        $created_commission_record->commpayable()->create([
            self::$foreign_key => $created_commission_record->id,
        ]);
    }

    private static function delete_payable($deleted_commission_record)
    {
        $deleted_commission_record->commpayable()->delete();
    }

    public function getCreatedAtAttribute($value)
    {
        return date('dMy H:i:s', strtotime($value));
    }

    public function commclaim()
    {
        return $this->hasOne(CommissionClaim::class, 'commrecord_id');
    }

    public function commcompany()
    {
        return $this->hasOne(CommissionReferrer::class, 'commrecord_id');
    }

    public function commpayable()
    {
        return $this->hasOne(CommissionPayable::class, self::$foreign_key);
    }

}

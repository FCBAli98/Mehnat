<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attestation extends Model
{
    protected $table = 'attestations';

    protected $fillable = [
        'conclusion_number',
        'conclusion_date',
        'company_name',
        'company_tin',
        'xxtut',
        'mxbt',
        'region_id',
        'city_id',
        'company_id',
        'positions_count',
        'number',
        'attestation_company',
        'attestation_address',
        'attestation_tin',
        'certification_number',
        'expired_at',
        'payed_amount'
    ];



    public function region()
    {
        return $this->belongsTo('App\Region', 'region_id');
    }

    public function city()
    {
        return $this->belongsTo('App\City', 'city_id');
    }
}

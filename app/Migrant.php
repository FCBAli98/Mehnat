<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Migrant extends Model
{
    protected $table = 'migrants';

    protected $fillable = [
        "passport_series",
        "passport_number",
        "FIO",
        "birth_date",
        "phone",
        "region_id",
        "city_id",
        "address",
        "temp_region_id",
        "temp_city_id",
        "temp_address",
        "description",
    ];
}

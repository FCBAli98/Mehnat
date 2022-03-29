<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';

    public function statistics() {
        return $this->belongsToMany(Statistic::class, 'statistics_regions', 'region_id');
    }
}

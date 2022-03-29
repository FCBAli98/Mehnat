<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $table = 'statistics';

    protected $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
        'name_cyrl',
        'slug',
        'parent_id',
    ];

    public function regions() {
        return $this->belongsToMany(Region::class, 'statistics_regions', 'statistics_id');
    }

    public function parent() {
        return $this->belongsTo(Statistic::class, 'parent_id');
    }

    public function children() {
        return $this->hasMany(Statistic::class, 'parent_id');
    }
}

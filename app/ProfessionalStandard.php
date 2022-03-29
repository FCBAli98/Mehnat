<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessionalStandard extends Model
{
    protected $table = 'professional_standarts';

    protected $fillable = [
        'regionActivite',
        'standarbyRregion',
        'view_pro_avtivite',
        'latter_toMisistry',
        'registrationNumber',
        'responseOrganization',
        'datainAction',
        'incamingLatter',
        'amendedRegisNumber',
        'dataIntraAction',
        'files',
    ];

    protected $casts = [
        'files' => 'array',
    ];

    public function scopeSearch($query, $q)
    {
        if ($q == null) return $query;
        return $query
            ->where('id', 'LIKE', "%{$q}%")
            ->orWhere('regionActivite', 'LIKE', "%{$q}%")
            ->orWhere('standarbyRregion', 'LIKE', "%{$q}%")
            ->orWhere('view_pro_avtivite', 'LIKE', "%{$q}%")
            ->orWhere('latter_toMisistry', 'LIKE', "%{$q}%")
            ->orWhere('registrationNumber', 'LIKE', "%{$q}%")
            ->orWhere('responseOrganization', 'LIKE', "%{$q}%")
            ->orWhere('datainAction', 'LIKE', "%{$q}%")
            ->orWhere('incamingLatter', 'LIKE', "%{$q}%")
            ->orWhere('amendedRegisNumber', 'LIKE', "%{$q}%")
            ->orWhere('dataIntraAction', 'LIKE', "%{$q}%");
    }
}

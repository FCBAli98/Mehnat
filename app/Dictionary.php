<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    protected  $guarded = [];

    public function getLangsCheckAttribute()
    {
        $languages = \Config::get('laravellocalization.supportedLocales');
        if ($this->translatesCheck) {
            foreach ($this->translatesCheck as $translate) {
                if (isset($languages[$translate->languages])) {
                    $languages[$translate->languages]['exists'] = true;
                }
            }
        }
        return $languages;
    }
}

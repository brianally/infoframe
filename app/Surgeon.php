<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surgeon extends Model
{
    /**
     * hasMany association
     * 
     * @return App\Patient
     */
    public function patients() {
        return $this->hasMany('App\Patient');
    }
}

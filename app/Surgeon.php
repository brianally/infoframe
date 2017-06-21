<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FormatDate;

class Surgeon extends Model
{
    use FormatDate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
    ];

    /**
     * hasMany association
     * 
     * @return App\Patient
     */
    public function patients()
    {
        return $this->hasMany('App\Patient');
    }

}

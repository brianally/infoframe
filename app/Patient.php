<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FormatDate;

class Patient extends Model
{
    use FormatDate;

    const MALE        = 'm';
    const FEMALE      = 'f';
    const UNSPECIFIED = '?';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'gender',
        'age',
        'surgeon_id'
    ];

    public static $genders = [
        self::MALE => 'Male',
        self::FEMALE => 'Female',
        self::UNSPECIFIED => 'Unspecified'
    ];
  

    /**
    * belongsTo association
    * 
    * @return App\Surgeon
    */
    public function surgeon()
    {
        return $this->belongsTo('App\Surgeon');
    }
}

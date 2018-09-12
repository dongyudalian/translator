<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Translator extends Authenticatable
{
    //
    protected $table = "translators";

    public $timestamps = true;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function translator_and_specialities(){

        return $this->hasMany('App\Model\Translator_and_speciality','translators_id');

    }

    public function translator_and_statures(){

        return $this->hasMany('App\Model\Translator_and_stature','translators_id');

    }

    public function translator_and_ikus(){

        return $this->hasMany('App\Model\Translator_and_iku','translators_id');

    }

    public function translator_times(){

        return $this->hasMany('App\Model\Translator_time','translators_id');

    }

    public function mtb_translator_salary(){

        return $this->belongsTo('App\Mtb_translator_salary','translator_salaries_id');

    }

    public function visitor_reservation(){

        return $this->hasOne('App\Model\Visitor_reservation','translator_id','id');

    }

    public function mtb_translator_specialities(){

        return $this->belongsToMany('App\Model\Mtb_translator_speciality','translator_and_specialities','translators_id','specialities_id');

    }

    public function mtb_translator_ikus(){

        return $this->belongsToMany('App\Model\Mtb_translator_iku','translator_and_ikus','translators_id','ikus_id');

    }

    public function mtb_translator_statures(){

        return $this->belongsToMany('App\Model\Mtb_translator_stature','translators_id','statures_id');

    }



}

<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Job extends Model
{
    use HasApiTokens,Notifiable,SoftDeletes;
    
    protected $fillable = [
        'job_type','shift_type','number_utes','number_trafic','address','location','setup_required','notes','gtdc','booking_name','contact_number','time_req_site','date','time_start','status','tbc',
    ];

    public function staffs(){
        return $this->belongsToMany('App\Staff', 'job_staff', 'job_id', 'staff_id')->withPivot('confirm');
    }

    public function client(){
        return $this->belongsTo('App\Client','id_client');
    }

    public function permits(){
        return $this->belongsToMany('App\Archivo', 'job_permit', 'job_id', 'archivo_id');
    }

    public function tgs(){
        return $this->belongsToMany('App\Archivo', 'job_tgs', 'job_id', 'archivo_id');
    }

}

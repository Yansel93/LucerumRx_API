<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperimentalCondition extends Model
{
    use HasFactory;

    protected $fillable =[
        'dosage_id',
        'study_id',
        'timepoint_id',
        'group_id',
        'createdby',
        'ownercompany',
        'lastupdatedby'
        
    ];

    protected $hidden = [
        'is_deleted',
        'created_at',
        'updated_at'
    ];

    /**Relations */
    public function Users(){
        return $this->belongsTo(User::class,'createdby');
    }

    public function Study(){
        return $this->hasOne(Study::class,'study_id');
    }

    public function Timepoint(){
        return $this->hasOne(Timepoint::class,'timepoint_id');
    }

    public function Group(){
        return $this->hasOne(Group::class,'group_id');
    }

    public function Dosage(){
        return $this->hasOne(Dosage::class,'dosage_id');
    }

    public function Company(){
        return $this->hasOne(Company::class,'ownercompany');
    }
}

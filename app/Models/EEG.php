<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EEG extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subject_id',
        'study_id',
        'experimentalconditionid',
        'filepath',
        'createdby',
        'ownercompany',
        'lastupdatedby',
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

    public function Company() {
        return $this->hasOne(Company::class,'ownercompany');
    }
    
    public function TargetClass() {
        return $this->hasOne(TargetClass::class,'targetclass_id');
    }

    

    public function Subject() {
        return $this->hasOne(Subject::class,'subject_id');
    }

    public function Study() {
        return $this->hasOne(Study::class,'study_id');
    }
}

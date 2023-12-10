<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable =[
        'uid',
        'study_id',
        'species_id',
        'strain_id',
        'geneticmodtype',
        'group_id',
        'sex',
        'age',
        'ageunit',
        'dob',
        'acclimationlength',
        'acclimationlengthUnit',
        'clinicalstatus',
        'active',
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
    public function Study() {
        return $this->belongsTo(Study::class,'study_id');
    }

    public function Specie() {
        return $this->hasOne(Specie::class,'species_id');
    }

    public function Strain() {
        return $this->hasOne(Strain::class,'strain_id');
    }

    public function Group() {
        return $this->hasOne(Group::class,'group_id');
    }

    public function GeneticType() {
        return $this->hasOne(GeneticallyModifiedType::class,'geneticmodtype');
    }

    public function Company() {
        return $this->hasOne(Company::class,'ownercompany');
    }
}

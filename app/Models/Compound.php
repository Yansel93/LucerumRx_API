<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compound extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'effectonsleep_id',
        'compoundclass_id',
        'compoundsubclass_id',
        'target_id',
        'targetselectivity',
        'name',
        'synonyms',
        'tradenames',
        'chemicalstructure',
        'casregistrynumber',
        'indication',
        'description',
        'bioactivity',
        'abusepotential',
        'createdby',
        'ownerCompany',
        'lastUpdatedBy',
    ];
    
    protected $hidden = [
        'is_deleted',
        'created_at',
        'updated_at'
    ];

    public function Users(){
        return $this->hasOne(Users::class);
    }

    public function CompoundClass(){
        return $this->hasOne(CompoundClass::class,'compoundclass_id');    
    }

    public function CompoundSubClass(){
        return $this->hasOne(CompoundSubclass::class,'compoundsubclass_id');    
    }

    public function Target(){
        return $this->hasOne(Target::class,'target_id');
    }

    public function Company(){
        return $this->hasOne(Company::class,'ownercompany');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;

    protected $fillable =[
        'targetclass_id',
        'name',
        'accession',
        'swissprotid',
        'organism',
        'gene',
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

    public function TargetClass() {
        return $this->hasOne(TargetClass::class,'targetclass_id');
    }

    public function Company() {
        return $this->hasOne(Company::class,'ownercompany');
    }
}

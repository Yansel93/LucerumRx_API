<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosage extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'uid',
        'createdby',
        'ownercompany',
        'lastupdatedby',
        'route_id',
        'compound_id',
        'level',
        'study_id'

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

    public function DoseRoute(){
        return $this->hasOne(DoseRoute::class,'route_id');
    }

    public function Compound(){
        return $this->hasOne(Compound::class,'compound_id');
    }

    public function Company(){
        return $this->hasOne(Company::class,'ownercompany');
    }
}

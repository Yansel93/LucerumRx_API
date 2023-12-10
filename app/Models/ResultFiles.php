<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultFiles extends Model
{
    use HasFactory;

    protected $fillable =[
        'study_id','studyversion',
        'filepath',
        'createdby',
        'ownercompany',
        'lastupdatedby'
    ];

    protected $hidden = [
        'is_deleted',
        'created_at',
        'updated_at'
    ];

    public function Users(){
        return $this->belongsTo(User::class,'createdby');
    }

    public function Company() {
        return $this->hasOne(Company::class,'ownercompany');
    }

    public function Study() {
        return $this->hasOne(Study::class,'study_id');
    }

    // public function AnalysisRequest() {
    //     return $this->hasOne(AnalysisRequest::class,'study_id');
    // }
}

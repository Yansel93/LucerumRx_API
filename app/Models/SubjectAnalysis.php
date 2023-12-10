<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectAnalysis extends Model
{
    use HasFactory;

    protected $fillable =[
        'study_id','studyversion','subject_id','invalid',
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

    public function Subject() {
        return $this->hasOne(Subject::class,'subject_id');
    }

}

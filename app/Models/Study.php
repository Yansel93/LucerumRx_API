<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    use HasFactory;

    protected $fillable =[
        'type_id',
        'version',
        'locked',
        'locked_by',
        'locked_moment',
        'name',
        'valid',
        'channeltype',
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
    public function Subject() {
        return $this->hasMany(Subject::class,'id');
    }

    public function StudyType() {
        return $this->belongsTo(StudyType::class,'type_id');
    }

    public function Users(){
        return $this->belongsTo(User::class,'createdby');
    }

    public function Company() {
        return $this->hasOne(Company::class,'ownercompany');
    }

    public function FileTest(){
        return $this->hasMany(FileTest::class);
    }

    
}

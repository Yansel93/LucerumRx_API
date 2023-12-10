<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strain extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
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

    public function Users(){
        return $this->belongsTo(User::class,'createdby');
    }

    public function Company() {
        return $this->hasOne(Company::class,'ownercompany');
    }
}

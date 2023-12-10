<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Company extends Model
{
    use HasFactory;

    protected $fillable =[
        'companyname',
        'uid', 
        'countryoforigin',
        'address',
        'registeringcode',
        'codecreationdate',
        'expirydate',
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
        return $this->hasMany(Study::class,'id');
    }

    public function Group(){
        return $this->hasMany(Group::class,'id');
    }

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneticallyModifiedType extends Model
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

    public function Users(){
        return $this->belongsTo(User::class,'createdby');
    }

    public function Company() {
        return $this->hasOne(Company::class,'ownercompany');
    }
}



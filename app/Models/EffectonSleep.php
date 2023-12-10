<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EffectonSleep extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'name',
        'createdby',
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

    
}

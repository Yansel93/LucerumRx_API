<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'user_id',
        'email',
        'verificationcode',
        'verified',
        'codecreationdate',
        'expirydate',
    ];

    protected $hidden = [
        'is_deleted',
        'created_at',
        'updated_at'
    ];
    
    public function getHashedVerificationcodeAttribute()
    {
        return hash('sha256', $this->attributes['verificationcode']);
    }
    /*Relations */
    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
}

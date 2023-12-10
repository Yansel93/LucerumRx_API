<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoseRoute extends Model
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
}

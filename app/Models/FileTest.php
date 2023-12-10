<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileTest extends Model
{
    use HasFactory;

    protected $fillable =[
        'study_id',
        'file'
        
    ];

    protected $hidden = [
        'is_deleted',
        'created_at',
        'updated_at'
    ];

    /**Relations */
    public function Users(){
        return $this->belongsTo(Study::class,'study_id');
    }
}

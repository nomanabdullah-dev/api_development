<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable=[
        'classe_id',
        'subject_name',
        'subject_code'
    ];

    public function class(){
        return $this->belongsTo(Classe::class);
    }
}

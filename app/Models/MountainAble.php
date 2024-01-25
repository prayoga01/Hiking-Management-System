<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MountainAble extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function mountain(){
        return $this->belongsTo(Mountain::class);
    }

}
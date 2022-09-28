<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SourceAdmin extends Model
{
    use HasFactory;
    public function Source(){
        return $this->hasOne(Source::class,'source_id','source_id');
    }
    public function User(){
        return $this->hasOne(User::class,'id','user_id');
    }
}

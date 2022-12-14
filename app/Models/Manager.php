<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;

    public function User(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function Reader(){
        return $this->hasMany(Reader::class,'id','user_id');
    }
    public function Source(){
        return $this->hasOne(Source::class,'source_id','source_id');
    }
    public function SourceAdmin(){
        return $this->hasOne(SourceAdmin::class,'source_id','source_id');
    }

}

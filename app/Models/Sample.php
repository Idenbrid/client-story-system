<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    use HasFactory;
    public function Story(){
        return $this->hasOne(Story::class,'id','story_id');
    }
    public function Reader(){
        return $this->hasOne(Reader::class,'id','reader_id');
    }
}

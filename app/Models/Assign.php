<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    use HasFactory;

    public function Reader(){
        return $this->belongsTo(Reader::class,'reader_id','id');
    }
    // public function SourceAdmin(){
    //     return $this->hasOne(SourceAdmin::class,'user_id','id');
    // }
    public function Manager(){
        return $this->belongsTo(Manager::class,'manager_id','id');
    }
    public function Story(){
        return $this->belongsTo(Story::class,'story_id','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    public function Sample(){
        return $this->hasMany(Sample::class,'id','story_id');
    }
}

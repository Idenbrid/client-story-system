<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'gender',
        'source_id',
        'source_assignee_id',
        'user_id',
    ];
    public function User(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function Source(){
        return $this->hasOne(Source::class,'id','source_id');
    }
}

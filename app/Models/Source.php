<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\SourceAdmin;

class Source extends Model
{
    use HasFactory;
    protected $fillable = [
            'source_name',
            'source_id',
            'address',
            'email',
            'phone',
            'status',
            'user_id',
            'created_at',
            'updated_at',
    ];
    public function SourceAdmin(){
        return $this->belongsTo(SourceAdmin::class,'source_id','source_id');
    }
    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    // public function SourceAdmin(){
    //     return $this->belongsTo(User::class,'user_id','id');
    // }
}

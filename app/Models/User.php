<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Source;
use App\Models\SourceAdmin;
use Laravel\Sanctum\HasApiTokens;

use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Source(){
        return $this->hasOne(Source::class,'user_id','id');
    }
    public function SourceAdmin(){
        return $this->hasOne(SourceAdmin::class,'user_id','id');
    }
    public function Manager(){
        return $this->belongsTo(Manager::class,'id','user_id')->with('SourceAdmin')->with('Source');
    }
    public function Reader(){
        return $this->belongsTo(Reader::class,'reader_id','id');
    }
    public function ReaderData(){
        return $this->hasOne(Reader::class,'user_id','id');
    }
}

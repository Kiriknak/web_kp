<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $guarded = [
        'id'
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

    protected $dates = [
        'created_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }






    // public function pembayaran()
    // {
    //     return $this->hasMany(Pembayaran::Role::class, 'role_id');
    // }


    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public  function isAdmin()
    {
        return $this->roles()->where('name', 'admin')->exists();
    }

    public function isUser()
    {
        return $this->roles()->where('name', 'user')->exists();
    }

    public function isOwner()
    {
        return $this->roles()->where('name', 'owner')->exists();
    }

    public function getCustomer()
    {
        return $this->customer();
    }
    // public function attachRole($attrole)
    // {
    //     $user->role() = $attrole;
    // }
}

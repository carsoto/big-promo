<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use Carbon\Carbon;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes, HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'phone',
        'aditional_phone',
        'city_id',
        'birthday',
        'email',
        'password',
        'is_admin',
        'terms_conditions',
        'confirmed',
        'confirmation_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = ['accumulated'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['deleted_at'];

    public function fullName() {
        return $this->name." ".$this->lastname;
    }

    public function formattedRegister() {
        return $this->created_at->format('d-m-Y');
    }

    public function age() {
        $age = Carbon::parse($this->birthday)->diff(Carbon::now())->y;
        return $age.' años';
    }

    public function user_exchanges()
    {
        return $this->hasMany(UserExchange::class);
    }

    public function user_dreams()
    {
        return $this->hasMany(UserDream::class);
    }

    public function getAccumulatedAttribute() {
        $max_points = env('MAX_POINTS', 5000);
        $accumulated = $this->user_exchanges->sum('points') + $this->user_exchanges->sum('aditional_points');
        if($accumulated > $max_points){
            $dreams = $this->user_dreams()->count();
            $points_used = $dreams * $max_points;
            $dreams_points = $accumulated - $points_used;
            $accumulated = $dreams_points;
            return $accumulated;
        }
        
        return $accumulated;
    }
}

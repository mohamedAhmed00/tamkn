<?php

namespace App\Modules\Student\Model;

use App\Modules\Order\Model\Order;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * @var string
     */
    protected $table ="users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','phone_number','age','image','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Orders()
    {
        return $this->hasMany(Order::class);
    }
}

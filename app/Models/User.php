<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Contracts\Role;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes,HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'user_check',
        'avatar',
        'tc_no',
        'gender',
        'phone',
        'address',
        'county',
        'state',
        'city',
        'zip_code',


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
        'create_at'=>'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function mostOrderedProducts()
    {
        $orders = $this->orders;
        $products = collect();

        foreach ($orders as $order) {
            foreach ($order->products as $product) {
                $products->push($product);
            }
        }

        return $products->countBy('id')->sortDesc();
    }

    public function get_role_names()
    {
        return $this->getRoleNames();
    }

    public function palcity()
    {
        return $this->hasOne(City::class,'id','city');
    }

}

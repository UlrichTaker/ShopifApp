<?php

namespace App\Models;

use Osiset\ShopifyApp\Contracts\ShopModel as IShopModel; // Importe l'interface IShopModel depuis le package osiset/laravel-shopify et l'aliasse en tant que IShopModel
use Osiset\ShopifyApp\Traits\ShopModel; //Importe le trait ShopModel depuis le package osiset/laravel-shopify
use Illuminate\Contracts\Auth\MustVerifyEmail; //Importe l'interface MustVerifyEmail de Laravel, qui est utilisée pour la vérification des adresses e-mail.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements IShopModel
{
    use HasApiTokens, HasFactory, Notifiable;
    use ShopModel;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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
}

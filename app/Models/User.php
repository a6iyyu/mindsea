<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\LogsActivity;
class User extends Authenticatable
{
  /** @use HasFactory<\Database\Factories\UserFactory> */
  use HasApiTokens, HasFactory, Notifiable, LogsActivity;

  /**
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'email',
    'password',
    'bio',
    'provider',
    'provider_id',
    'avatar',
    'is_admin',
  ];

  /**
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * @return array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
    'is_admin' => 'boolean',
  ];
}
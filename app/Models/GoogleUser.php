<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'google_id',
        'avatar',
        'email_verified',
        'google_token',
        'google_refresh_token',
    ];
}

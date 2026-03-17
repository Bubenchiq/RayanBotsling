<?php

namespace App\Models\Telegram;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'tg_users';

    protected $fillable = [
        'tg_id',
        'first_name',
        'last_name',
        'username',
        'language_code',
        'is_premium',
        'is_bot',
    ];

}

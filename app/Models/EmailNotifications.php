<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailNotifications extends Model
{
    protected $fillable = [
        'users_id', 'user_apps_id', 'notification_enabled'
    ];
    use HasFactory;
}

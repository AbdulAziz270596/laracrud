<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    protected $fillable = [
        'name', 'is_publish', 'created_at', 'updated_at',
    ];

    use Notifiable;

    // ...

    public function routeNotificationFor($driver)
    {
        // Return email address of the user who should receive the notification
        return $this->user->email;
    }

}

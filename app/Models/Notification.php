<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

     //Relationship with users
     public function user()
     {
         return $this->belongsTo(User::class, 'notifiable_id');
     }
}

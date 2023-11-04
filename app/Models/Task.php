<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

        //fillable attributes
        protected $fillable = ['title', 'description', 'status', 'user_id', 'admin_id'];

        //relationship with users
        public function user()
        {
            return $this->belongsTo(User::class);
        }

        //relationship with tags
        public function tags()
        {
            return $this->belongsToMany(Tag::class);
        }

        //relationship with statuses
        public function status()
        {
            return $this->belongsTo(Status::class);
        }

}

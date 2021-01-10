<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authentication extends Model
{
    use HasFactory;
    
    public function user() {
        return $this->hasOne(User::class, 'user_id');
    }
    
    public function duty() {
        return $this->hasOne(DutyPost::class, 'duty_id');
    }
}

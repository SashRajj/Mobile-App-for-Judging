<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'AdminID',
        'Name',
        'Email',
        'Password',
        // Other admin fields...
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

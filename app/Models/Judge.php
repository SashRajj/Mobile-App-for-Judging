<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Judge extends Model
{
    use HasFactory;

    protected $primaryKey = 'JudgeID';

    protected $fillable = [
        'user_id',
        'Name',
        'Email',
        'Password',
        // Other judge fields...
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function events()
    {
        return $this->hasMany(EventJudge::class, 'JudgeID', 'JudgeID');
    }
}

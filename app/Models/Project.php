<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'Title', 
        'Description', 
        'SubmissionLink', 
        'Participants',
        'EventID',
    ];

    protected $primaryKey = 'ProjectID'; 

    public function group()
    {
        return $this->hasOne(Group::class, 'ProjectID');
    }

    public function event(){
        return $this->belongsTo(Event::class, 'EventID');
    }
}

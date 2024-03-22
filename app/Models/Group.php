<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['Name', 'EventID', 'ProjectID'];

    protected $primaryKey = 'GroupID'; 

    public function event()
    {
        return $this->belongsTo(Event::class, 'EventID');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'ProjectID');
    }
    
    public function participants()
    {
        return $this->hasMany(Participant::class, 'GroupID', 'GroupID');
    }

}

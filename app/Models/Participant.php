<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;

class Participant extends Model
{
    use HasFactory;

    protected $primaryKey = 'ParticipantID';

    protected $fillable = [
        'Name', 'Email', 'GroupID'
    ];

    public function group(){
        return $this->belongsTo(Group::class, 'GroupID');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use App\Models\Judge;
use App\Models\Group;

class EventJudge extends Model
{
    use HasFactory;

    protected $primaryKey = 'EventJudgeID';

    protected $fillable = [
        'EventID',
        'JudgeID',
        'GroupID',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'EventID');
    }

    public function judge()
    {
        return $this->belongsTo(Judge::class, 'JudgeID');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'GroupID');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Judge;
use App\Models\Group;

class JudgeGroup extends Model
{
    use HasFactory;

    protected $primaryKey = 'JudgeGroupID';

    public function judge()
    {
        return $this->belongsTo(Judge::class, 'JudgeID');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'GroupID');
    }
}

<?php
//irelandoutfitters.com
//Password: xG7*CK@9ea12!
//Pin: 020423

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'AdminID',
        'Name',
        'Description',
        'StartDate',
        'EndDate',
    ];

    protected $primaryKey = 'EventID';

    public function groups()
    {
        return $this->hasMany(Group::class, 'EventID');
    }

}

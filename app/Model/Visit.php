<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $table = 'visit';
    public $timestamps = false;
    public $fillable = ['userId', 'visitId'];

    public function user()
    {
        return $this->hasOne('App\Model\User', 'id', 'visitId');
    }

    public static function addVisit($userId)
    {
        $visit = new Visit();
        $visit->userId = $userId;
        $visit->visitId = session('user');
        $visit->save();
    }
}
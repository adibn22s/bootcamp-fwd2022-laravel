<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConfigPayment extends Model
{
    // use HasFactory;
    use SoftDeletes;
    public $table = 'consultation';

    // this fiela must type date yyyy-mm-dd hh-mm-ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // declare fillable
    protected $fillable [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // one to many
    public function appointment()
    {
        // 2 parameters (path models dan field foreign key)
        return $this->hasMany('app\Models\Operational\Appointment.php','consultation_id');
    }
}

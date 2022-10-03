<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    // use HasFactory;
    use SoftDeletes;
    public $table = 'appointment';

    // this fiela must type date yyyy-mm-dd hh-mm-ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // declare fillable
    protected $fillable = [
        'doctor_id',
        'user_id',
        'consultation_id',
        'level',
        'date',
        'time',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // one to many
    public function doctor()
    {
        // 3 parameters (path models ,field foreign key dan field primary key dari tabel hasmany/hasone)
        return $this->belongsTo('app\Models\Operational\doctor.php','doctor_id','id');
    }

    // one to many
    public function consultation()
    {
        // 3 parameters (path models ,field foreign key dan field primary key dari tabel hasmany/hasone)
        return $this->belongsTo('app\Models\MasterData\Consultation.php','consultation_id','id');
    }

    // one to many
    public function user()
    {
        // 3 parameters (path models ,field foreign key dan field primary key dari tabel hasmany/hasone)
        return $this->belongsTo('app\Models\User.php','user_id','id');
    }

    // one to one
    public function transaction()
    {
        // 2 parameters (path models dan field foreign key)
        return $this->hasOne('app\Models\Operational\Transaction.php','appointment_id');
    }

    
}

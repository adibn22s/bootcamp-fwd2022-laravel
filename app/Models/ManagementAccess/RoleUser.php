<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailUser extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // Declare:table
    public $table = 'role_user';

    // this fiela must type date yyyy-mm-dd hh-mm-ss
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // declare fillable
    protected $fillable = [
        'user_id',
        'role_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // one to many
    public function user()
    {
        // 3 parameters (path models ,field foreign key dan field primary key dari tabel hasmany/hasone)
        return $this->belongsTo('app\Models\User.php','user_id','id');
    }

    // one to many
    public function role()
    {
        // 3 parameters (path models ,field foreign key dan field primary key dari tabel hasmany/hasone)
        return $this->belongsTo('app\Models\ManagementAccess\Role.php','role_id','id');
    }
}

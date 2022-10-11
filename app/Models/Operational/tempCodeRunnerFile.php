<?php
// one to one
    public function appointment()
    {
        // 3 parameters (path models ,field foreign key dan field primary key dari tabel hasmany/hasone)
        return $this->belongsTo('app\Models\Opertaional\Appointment.php','appointment_id','id');
    }
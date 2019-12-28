<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LuotChoi extends Model
{
    //
    protected $table = 'Luot_Choi';
    protected $fillable = ['Nguoi_choi_id', 'So_Cau', 'Dem'];
    public function cauHoi()
    {
        return $this->belongsToMany('App\CauHoi', 'chi_tiet_luot_choi');
    }
    public function getCreatedAtAttribute($date)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');
    }
}

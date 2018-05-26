<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table='barang';
    protected $guarded = [];

    public function pelapor()
    {
    	return $this->belongsTo('App\User', 'pelapor_id');
    }

    public function penemu()
    {
    	return $this->belongsTo('App\User', 'penemu_id');
    }
}

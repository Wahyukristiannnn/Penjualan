<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use DB;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    protected $primaryKey = 'kode_penjualan';
    protected $fillable = ['kode_penjualan','tanggal','deskripsi','metode_pembayaran','nominal','id_user'];
    public $timestamps = false;
    public $incrementing = false;

    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

 	public static function kode()
    {
    	$kode = DB::table('penjualan')->max('kode_penjualan');
    	$addNol = '';
    	$kode = str_replace("PJ", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "000";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "00";
    	} elseif (strlen($kode == 3)) {
    		$addNol = "0";
    	}

    	$kodeBaru = "PJ".$addNol.$incrementKode;
    	return $kodeBaru;
    }
}

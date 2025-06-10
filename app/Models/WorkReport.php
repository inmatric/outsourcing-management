<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkReport extends Model
{
    //membuat nama tabel menjadi nama indo
    protected $table="work_report";

    //melindungi kolom tabel
    protected $guarded=[];
}

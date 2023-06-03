<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class M_Crud extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable =[
        'tendanhmuc','mota','trangthai'
    ];
    protected $primarykey = 'iddanhmuc';
    protected $table = 'tbldanhmucsp';

    protected $hidden;
}

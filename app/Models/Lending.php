<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lending extends Model
{
    use HasFactory;
    protected  $primaryKey = ['user_id','copy_id','start'];

    protected $fillable = [
        'user_id',
        'book_id',
        'start'
    ];
}

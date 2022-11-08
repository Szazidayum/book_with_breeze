<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Copy;

class Book extends Model
{
    use HasFactory;

    protected  $primaryKey = 'book_id';

    protected $fillable = [
        'author',
        'title'
    ];
    public function book_copy(){
        //első paraméter az elsődleges kulcs, a második a tábla mezője
        return $this-> hasMany(Copy::class, 'book_id', 'book_id');
    }
}

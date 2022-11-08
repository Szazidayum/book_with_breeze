<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lending extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'start'
    ];
    public function lending_user(){
        //első paraméter az elsődleges kulcs, a második a tábla mezője
        return $this-> hasOne(User::class, 'id', 'user_id');
    }
}

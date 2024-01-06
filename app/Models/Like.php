<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['id_user', 'id_cerita'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cerita()
    {
        return $this->belongsTo(Cerita::class);
    }
}

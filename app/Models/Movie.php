<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies'; // Tên bảng

    protected $fillable = [
        'movie_id',
        'title',
        'description',
        'director',
        'actors',
        'genre',
        'release_date',
        'trailer',
        'poster',
        'status',
    ];

    // Nếu sử dụng kiểu dữ liệu JSON
    protected $casts = [
        'release_date' => 'date',
    ];
}

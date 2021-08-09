<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageSpeciality extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_1',
        'subtitle_1',
        'title_2',
        'subtitle_2',
        'title_3',
        'subtitle_3',
    ];
}

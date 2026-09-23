<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = [
        'nama', 
        'nim', 
        'nama_project', 
        'mentor_industri',
        'mentor',
        'penjelasan_project',
        'team',
        'file_laporan',
        'photos',
        'report_type'
    ];

    protected $casts = [
        'photos' => 'array'
    ];
}
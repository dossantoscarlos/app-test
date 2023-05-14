<?php

namespace App\Models;

use App\Traits\ProcessaCepTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Spreadsheet extends Model
{
    use ProcessaCepTrait;
    use HasFactory;

    protected $fillable = [
        'url'
    ];


    

}

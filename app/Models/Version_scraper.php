<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version_scraper extends Model
{
    use HasFactory;

    public function scraper(){
        return $this->hasMany(Applications::class);
    }

}

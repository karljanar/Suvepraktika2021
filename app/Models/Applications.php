<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;


    protected $primaryKey = 'id';

    protected $fillable = ['version_scraper_id', 'real_app_url', 'app_url', 'current_version',
        'app_loc_in_server', 'comments',
        'service_subscriber_name', 'technical_supervisor_name',
        'content_supervisor_name'];

    public function emailnotification(){
        return $this->hasMany(Email_notification::class);
    }

    public function applicationarchive(){
        return $this->hasMany(Application_archive::class);
    }




}

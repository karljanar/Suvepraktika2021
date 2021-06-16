<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApps extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = ['version_scraper_id', 'user_app_name', 'real_app_url', 'app_url', 'current_version',
        'app_loc_in_server', 'comments',
        'service_subscriber_name', 'technical_supervisor_name',
        'content_supervisor_name'];


    public function frameworksdb(){
        return $this->belongsTo(Frameworks::class);
    }

    public function notify(){
        return $this->belongsToMany(EmailNotifications::class);
    }
}

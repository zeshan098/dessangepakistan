<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class UserService extends Model
{
    use Notifiable;
    public $table = "services_service";
    public $timestamps = false;
    
    protected $fillable = [
        'name', 'description', 'start_date', 'end_date', 'cost', 'duration','status','major_type_id',
        'sub_type_id', 'branch_id', 'category', 'picture', 'service_category',
        'service_duration', 'service_time','slug', 'meta_title', 'meta_description',
        'meta_keywords', 'service_content' ];


}
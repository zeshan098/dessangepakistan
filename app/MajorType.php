<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class MajorType extends Model
{
    use Notifiable;
    public $table = "services_majortype";
    public $timestamps = false;
    protected $fillable = [
         'name', 'branch_id', 'status', 'image', 'category_type', 'slug', 'meta_title',
         'meta_description', 'meta_keywords', 'major_content'  ];
    public function subtype()
    {
        return $this->hasMany('App\SubType');
    }
}

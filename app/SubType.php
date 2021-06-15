<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class SubType extends Model
{
    use Notifiable;
    public $table = "services_subtype";
    public $timestamps = false;
    protected $fillable = [
        'name', 'major_type_id', 'status', 'image', 'slug', 'meta_title',
        'meta_description', 'meta_keywords', 'subtype_content'  ];
    public function menu()
    {
        return $this->belongsTo('App\MajorType');
    }
}

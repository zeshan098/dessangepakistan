<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class InventorySubType extends Model
{
    use Notifiable;
    public $table = "inventory_productsubtype";
    public $timestamps = false;
    protected $fillable = [
        'name', 'inventory_major_type_id','image', 'status', 'slug', 'meta_title', 'meta_description', 'meta_keywords', 'subtype_content'  ];
    public function menu()
    {
        return $this->belongsTo('App\InventoryMajorType');
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class InventoryMajorType extends Model
{
    use Notifiable;
    public $table = "inventory_productmajortype";
    public $timestamps = false;
    protected $fillable = [
         'name', 'branch_id', 'status', 'image', 'slug', 'meta_title', 'meta_description', 'meta_keywords', 'major_content'  ];
    public function prosubtype()
    {
        return $this->hasMany('App\InventorySubType');
    }
}

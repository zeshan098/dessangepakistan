<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class InventoryProduct extends Model
{
    use Notifiable;
    public $table = "inventory_product";
    public $timestamps = false;
    protected $fillable = [
        'product_name', 'reference_number', 'weight', 'weight_unit','cost',
        'description', 'major_type_id', 'sub_type_id', 
        'meta_title', 'meta_description', 'meta_keywords', 'slug', 'picture', 'status', 'user_id', 'date'  ];
}

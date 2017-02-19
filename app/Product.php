<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $table = 'product';

    protected $fillable = [
        'product_category_id',
        'product_group_id',
        'product_subgroup_id',
        'title',
        'slug',
        'short_description',
        'long_description',
        'status',
        'sku',
        'class',
        'group',
        'sell_rate',
        'cost_price',
        'sell_unit',
        'sell_unit_quantity',
        'stock_unit',
        'stock_unit_quantity',
        'is_price_vary',
        'is_featured',
        'image',
        'thumb',
        'brand',
        'voltage',
        'seats',
        'features',
        'videos',
        'sort_order',
        'preorder',
        'weight',
        'length',
        'width',
        'height',
        'volume',
		'sticker'
    ];

     public function relCatProduct(){
        return $this->belongsTo('App\ProductCategory', 'product_category_id', 'id');
    }

     public function relProductGroup(){
        return $this->belongsTo('App\ProductGroup', 'product_group_id', 'id');
    }

    public function relSubGroup(){
        return $this->belongsTo('App\ProductSubgroups', 'product_subgroup_id', 'id');
    }
}

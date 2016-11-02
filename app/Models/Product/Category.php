<?php

namespace App\Models\Product\Category;

use App\Models\Product\Product;
use Kalnoy\Nestedset\Node;

/**
 * Class Category
 * package App
 */
class Category extends Node {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'name',
        'description'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable() {
        //return ['slug' => ['source' => 'name']];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function product() {
        return $this->hasMany(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function parent() {
        return $this->hasOne(\App\Models\Product\Category\Category::class, 'id', 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function children() {
        return $this->hasMany(\App\Models\Product\Category\Category::class, 'parent_id', 'id');
    }

    /**
     * 
     */
    public function getName() {
        return ucfirst($this->attributes['name']);
    }

    /**
     * 
     */
    public function getTypeCategoryName() {
        if (is_null($this->attributes['parent_id'])) {
            return 'Categoria Principal';
        }
        return ucfirst($this->parent->attributes['name']);
    }

    /**
     * 
     */
    public function getCreated()
    {
        return date('d/m/Y H:i', strtotime($this->attributes['created_at']));
    }
}

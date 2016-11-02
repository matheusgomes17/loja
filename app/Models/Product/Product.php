<?php

namespace App\Models\Product;

use App\Models\Access\User\User;
use App\Models\Product\Size\Size;
use App\Models\Product\Category\Category;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * package App
 */
class Product extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'slug',
        'cover',
        'cod',
        'price',
        'description',
        'qtd'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function size() {
        return $this->belongsToMany(Size::class, 'product_size_pivot', 'product_id', 'size_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
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
    public function getCod() {
        return strtoupper($this->attributes['cod']);
    }

    /**
     * 
     */
    public function getCategory() {
        //
    }

    /**
     * 
     */
    public function getPrice() {
        return 'R$ ' . number_format($this->attributes['price'], 2, ',', '.');
    }

    /**
     * 
     */
    public function getCreated() {
        return date('d/m/Y', strtotime($this->attributes['created_at']));
    }

    /**
     * 
     */
    public function getUpdated() {
        return date('d/m/Y H:i', strtotime($this->attributes['updated_at']));
    }

}

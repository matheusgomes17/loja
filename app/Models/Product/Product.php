<?php

namespace PaperStore\Models\Product;

use PaperStore\Models\Access\User\User;
use PaperStore\Models\Product\Size;
use PaperStore\Models\Product\Category;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * package PaperStore
 */
class Product extends Model {

    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'category_id', 'name', 'cover', 'cod', 'price', 'description', 'qtd'];

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
     * Retorna o nome do produto
     * @return string
     */
    public function getName() {
        return ucfirst($this->attributes['name']);
    }

    /**
     * Retorna o codigo de identificacao do produto
     * @return string
     */
    public function getCod() {
        return strtoupper($this->attributes['cod']);
    }

    /**
     * 
     * @return string
     */
    public function getCategory() {
        //
    }

    /**
     * Retorna o preco do produto
     * @return string
     */
    public function getPrice() {
        return 'R$ ' . number_format($this->attributes['price'], 2, ',', '.');
    }

    /**
     * Retorna a data de quanto o registro foi criado
     * @return string
     */
    public function getCreated() {
        return date('d/m/Y', strtotime($this->attributes['created_at']));
    }

    /**
     * Retorna a data de quanto o registro foi alterado
     * @return string
     */
    public function getUpdated() {
        return date('d/m/Y H:i', strtotime($this->attributes['updated_at']));
    }

}

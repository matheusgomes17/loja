<?php

namespace PaperStore\Models\Product;

use PaperStore\Models\Product\Product;
use Kalnoy\Nestedset\Node;

/**
 * Class Category
 * package PaperStore
 */
class Category extends Node {

    /**
     * @var string
     */
    protected $table = 'products_categories';

    /**
     * @var array
     */
    protected $fillable = ['parent_id', 'name', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function product() {
        return $this->hasMany(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function parent() {
        return $this->hasOne(\PaperStore\Models\Product\Category::class, 'id', 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function children() {
        return $this->hasMany(\PaperStore\Models\Product\Category::class, 'parent_id', 'id');
    }

    /**
     * Retorna o nome da categoria do produto
     * @return string
     */
    public function getName() {
        return ucfirst($this->attributes['name']);
    }

    /**
     * Retorna o tipo de categoria do produto
     * @return string
     */
    public function getTypeCategoryName() {
        if (is_null($this->attributes['parent_id'])) {
            return 'Categoria Principal';
        }
        return ucfirst($this->parent->attributes['name']);
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

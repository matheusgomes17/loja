<?php

namespace PaperStore\Models\Product;

use PaperStore\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Size
 * package PaperStore
 */
class Size extends Model {

    /**
     * @var array
     */
    private $size = [
        'mm' => 'Milímetro',
        'cm' => 'Centímetro',
        'dm' => 'Decímetro',
        'm' => 'Metro'
    ];

    /**
     * @var string
     */
    protected $table = 'products_sizes';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'width', 'height', 'type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function product() {
        return $this->belongsToMany(Product::class, 'product_size_pivot', 'id', 'product_id');
    }

    /**
     * Retorna a largura com a altura da medida
     * @return string
     */
    public function getName() {
        return $this->getWidth().'x'.$this->getHeight();
    }

    /**
     * Retorna o tipo da medida
     * @return string
     */
    public function getType() {
        switch ($this->attributes['type']) {
            case 'm': return 'Metros'; break;
            case 'dm': return 'Decímetros'; break;
            case 'cm': return 'Centímetros'; break;
            case 'mm': return 'Milímitros'; break;
        default: return 'Não definido'; break;
        }
    }

    /**
     * Retorna a largura da medida
     * @return string
     */
    public function getWidth() {
        return $this->attributes['width'];
    }

    /**
     * Retorna a altura da medida
     * @return string
     */
    public function getHeight() {
        return $this->attributes['height'];
    }

    /**
     * Retorna a data de quanto o registro foi criado
     * @return string
     */
    public function getCreated(){
        return date('d/m/Y H:i', strtotime($this->attributes['created_at']));
    }

    /**
     * Retorna a data de quanto o registro foi alterado
     * @return string
     */
    public function getUpdated() {
        return date('d/m/Y H:i', strtotime($this->attributes['updated_at']));
    }
    
    /**
     * Retorna o tipo da medida
     * @return array
     */
    public function getSize() {
        return $this->size;
    }
}

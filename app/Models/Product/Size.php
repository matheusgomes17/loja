<?php

namespace App\Models\Product\Size;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Size
 * package App
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
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_size';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id', 'rgt', 'lft', 'type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function product() {
        return $this->belongsToMany(Product::class, 'product_size_pivot', 'id', 'product_id');
    }

    /**
     * 
     */
    public function getName() {
        return $this->getRgt() . 'x' . $this->getLft();
    }

    /**
     * 
     */
    public function getType() {
        switch ($this->attributes['type']) {
            case 'm':
                return 'Metros';
                break;
            case 'dm':
                return 'Decímetros';
                break;
            case 'cm':
                return 'Centímetros';
                break;
            case 'mm':
                return 'Milímitros';
                break;
        default:
            return 'Não definido';
            break;
        }
    }

    /**
     * 
     */
    public function getRgt() {
        return $this->attributes['rgt'];
    }

    /**
     * 
     */
    public function getLft() {
        return $this->attributes['lft'];
    }

    /**
     * 
     */
    public function getCreated() {
        return date('d/m/Y H:i', strtotime($this->attributes['created_at']));
    }

    /**
     * 
     */
    public function getUpdated() {
        return date('d/m/Y H:i', strtotime($this->attributes['updated_at']));
    }
    
    /**
     * 
     */
    public function getSize()
    {
        return $this->size;
    }

}

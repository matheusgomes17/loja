<?php

namespace PaperStore\Models\Access\Role;

use Illuminate\Database\Eloquent\Model;
use PaperStore\Models\Access\Role\Traits\RoleAccess;
use PaperStore\Models\Access\Role\Traits\Attribute\RoleAttribute;
use PaperStore\Models\Access\Role\Traits\Relationship\RoleRelationship;

/**
 * Class Role
 * @package PaperStore\Models\Access\Role
 */
class Role extends Model
{
    use RoleAccess, RoleAttribute, RoleRelationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'all', 'sort'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('access.roles_table');
    }
}

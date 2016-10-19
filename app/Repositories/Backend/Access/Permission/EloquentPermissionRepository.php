<?php

namespace PaperStore\Repositories\Backend\Access\Permission;

use PaperStore\Models\Access\Permission\Permission;

/**
 * Class EloquentPermissionRepository
 * @package PaperStore\Repositories\Permission
 */
class EloquentPermissionRepository implements PermissionRepositoryContract
{

	/**
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getAllPermissions($order_by = 'sort', $sort = 'asc')
    {
        return Permission::orderBy($order_by, $sort)->get();
    }
}
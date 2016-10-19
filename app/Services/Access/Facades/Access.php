<?php

namespace PaperStore\Services\Access\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Access
 * @package PaperStore\Services\Access\Facades
 */
class Access extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'access';
    }
}
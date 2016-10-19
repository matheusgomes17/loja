<?php

namespace PaperStore\Services\Access\Traits;

/**
 * Class AuthenticatesAndRegistersUsers
 * @package PaperStore\Services\Access\Traits
 */
trait AuthenticatesAndRegistersUsers
{
    use AuthenticatesUsers, RegistersUsers {
        AuthenticatesUsers::redirectPath insteadof RegistersUsers;
    }
}
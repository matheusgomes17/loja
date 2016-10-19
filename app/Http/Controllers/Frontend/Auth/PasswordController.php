<?php

namespace PaperStore\Http\Controllers\Frontend\Auth;

use PaperStore\Http\Controllers\Controller;
use PaperStore\Services\Access\Traits\ChangePasswords;
use PaperStore\Services\Access\Traits\ResetsPasswords;
use PaperStore\Repositories\Frontend\Access\User\UserRepositoryContract;

/**
 * Class PasswordController
 * @package PaperStore\Http\Controllers\Frontend\Auth
 */
class PasswordController extends Controller
{

    use ChangePasswords, ResetsPasswords;

    /**
     * @param UserRepositoryContract $user
     */
    public function __construct(UserRepositoryContract $user)
    {
        //Where to redirect the user after their password has been successfully reset
        $this->redirectTo = route('frontend.user.dashboard');
        
        $this->user = $user;
    }
}
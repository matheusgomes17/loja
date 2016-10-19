<?php

namespace PaperStore\Http\Controllers\Frontend\Auth;

use PaperStore\Http\Controllers\Controller;
use PaperStore\Services\Access\Traits\ConfirmUsers;
use PaperStore\Services\Access\Traits\UseSocialite;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use PaperStore\Services\Access\Traits\AuthenticatesAndRegistersUsers;
use PaperStore\Repositories\Frontend\Access\User\UserRepositoryContract;

/**
 * Class AuthController
 * @package PaperStore\Http\Controllers\Frontend\Auth
 */
class AuthController extends Controller
{

    use AuthenticatesAndRegistersUsers, ConfirmUsers, ThrottlesLogins, UseSocialite;

    /**
     * @param UserRepositoryContract $user
     */
    public function __construct(UserRepositoryContract $user)
    {
        //Where to redirect after logging out
        $this->redirectAfterLogout = route('frontend.index');

        $this->user = $user;
    }

    /**
     * Where to redirect users after login / registration.
     * @return string
     */
    public function redirectPath()
    {
        if (access()->allow('view-backend')) {
            return route('admin.dashboard');
        }
        
        return route('frontend.user.dashboard');
    }
}
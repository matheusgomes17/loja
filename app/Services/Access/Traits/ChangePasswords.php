<?php

namespace PaperStore\Services\Access\Traits;

use PaperStore\Http\Requests\Frontend\User\ChangePasswordRequest;

/**
 * Class ChangePasswords
 * @package PaperStore\Services\Access\Traits
 */
trait ChangePasswords
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showChangePasswordForm()
    {
        return view('frontend.auth.passwords.change');
    }

    /**
     * @param ChangePasswordRequest $request
     * @return mixed
     */
    public function changePassword(ChangePasswordRequest $request) {
        $this->user->changePassword($request->all());
        return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('strings.frontend.user.password_updated'));
    }
}
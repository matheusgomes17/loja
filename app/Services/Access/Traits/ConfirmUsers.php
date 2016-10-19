<?php

namespace PaperStore\Services\Access\Traits;

/**
 * Class ConfirmUsers
 * @package PaperStore\Services\Access\Traits
 */
trait ConfirmUsers
{

    /**
     * Confirms the users account by their token
     *
     * @param $token
     * @return mixed
     */
    public function confirmAccount($token)
    {
        $this->user->confirmAccount($token);
        return redirect()->route('auth.login')->withFlashSuccess(trans('exceptions.frontend.auth.confirmation.success'));
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function resendConfirmationEmail($user_id)
    {
        $this->user->resendConfirmationEmail($user_id);
        return redirect()->route('auth.login')->withFlashSuccess(trans('exceptions.frontend.auth.confirmation.resent'));
    }
}

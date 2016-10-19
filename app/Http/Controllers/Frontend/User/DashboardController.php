<?php

namespace PaperStore\Http\Controllers\Frontend\User;

use PaperStore\Http\Requests;
use PaperStore\Http\Controllers\Controller;

/**
 * Class DashboardController
 * @package PaperStore\Http\Controllers\Frontend
 */
class DashboardController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.dashboard')
            ->withUser(access()->user());
    }
}

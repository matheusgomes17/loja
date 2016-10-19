<?php

namespace PaperStore\Http\Controllers\Backend;

use PaperStore\Http\Controllers\Controller;

/**
 * Class DashboardController
 * @package PaperStore\Http\Controllers\Backend
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.dashboard');
    }
}
<?php

namespace PaperStore\Http\Controllers\Frontend;

use PaperStore\Http\Controllers\Controller;

/**
 * Class FrontendController
 * @package PaperStore\Http\Controllers
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        javascript()->put([
            'test' => 'it works!',
        ]);

        return view('frontend.index');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }
}

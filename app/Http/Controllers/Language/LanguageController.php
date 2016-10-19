<?php

namespace PaperStore\Http\Controllers\Language;

use PaperStore\Http\Controllers\Controller;

/**
 * Class LanguageController
 * @package PaperStore\Http\Controllers
 */
class LanguageController extends Controller
{
    /**
     * @param $lang
     * @return \Illuminate\Http\RedirectResponse
     */
    public function swap($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
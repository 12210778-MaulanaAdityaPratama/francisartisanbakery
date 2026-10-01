<?php

namespace App\Http\Controllers;

use App\Models\HomePageSetting;

class IndexController extends Controller
{
    public function index() {
        $settings = HomePageSetting::singleton();
        $home = HomePageSetting::defaults();

        foreach ($home as $section => $defaults) {
            $storedValues = $settings->{$section} ?? [];

            foreach ($defaults as $key => $default) {
                $storedValue = $storedValues[$key] ?? null;
                $home[$section][$key] = blank($storedValue) ? $default : $storedValue;
            }
        }

        return view('index', [
            'home' => $home,
        ]);
    }
}

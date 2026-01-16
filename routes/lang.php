<?php

use Illuminate\Support\Facades\Route;

Route::get('/lang/{locale}', function (string $locale) {
    if (!in_array($locale, ['en', 'es'])) {
        abort(400);
    }

    session(['locale' => $locale]);

    return redirect()->back()->with('success', __('Language changed'));
});

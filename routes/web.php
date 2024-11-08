<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.beranda');
});

Route::get('/latihan-soal', function () {
    return view('pages.latihan-soal');
});

Route::get('/masuk', function () {
    return view('pages.masuk');
});

Route::get('/daftar', function () {
    return view('pages.daftar');
});

Route::get('/profil', function () {
    return view('pages.profil');
});

Route::get('/tentang-kami', function () {
    return view('pages.tentang-kami');
});
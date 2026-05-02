<?php

public function index()
{
    $iklan = IklanSlider::all();
    return view('beranda', compact('iklan'));
}
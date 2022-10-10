<?php

require_once plugin_dir_path(__FILE__) . 'controller.php';

class InformasiController extends Controller
{

    public static function index()
    {
        return self::view('informasi', ['buah' => 'Stroberi']);
    }

}
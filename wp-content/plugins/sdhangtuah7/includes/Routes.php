<?php

require_once plugin_dir_path(__FILE__) . 'route.php';
require_once plugin_dir_path(__FILE__) . 'controllers/Controller.php';




// Route::post('update-buku', new DatabukuController, 'update');
Route::post('store-collection', new PengaturanController, 'store');
Route::post('update-collection', new PengaturanController, 'update');
Route::post('delete-collection', new PengaturanController, 'delete');


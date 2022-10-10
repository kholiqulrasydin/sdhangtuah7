<?php


class Loader
{

    public function __construct()
    {
        

    }

    public function run()
    {   
        add_action('init', function() {

            require_once plugin_dir_path(__FILE__) . 'routes.php';
        
        });
        $this->register_plugin();
    }

    protected function register_plugin()
    {
       
        function perpustakaan_index()
        {
            PengaturanController::index();
        }
        add_action('admin_menu', 'register');
        function register()
        {
         // Perpustakaan
            add_menu_page(
            'Perpustakaan', 'Perpustakaan',
            'manage_options',
            'perpustakaan',
            'perpustakaan_index', //callback
            'dashicons-book-alt',
            4
        );

        add_submenu_page(
            'perpustakaan',
            'Pengaturan',
            'Pengaturan',
            'manage_options',
            'perpustakaan_setting', 
            'perpustakaan_index' //callback
        );

        // Informasi

        function informasi_index()
        {
            InformasiController::index();
        }

        add_menu_page(
            'Informasi', 'Informasi',
            'manage_options',
            'informasi',
            'informasi_index', //callback
            'dashicons-info',
            4
        );

        add_submenu_page(
            'informasi',
            'Pengaturan',
            'Pengaturan',
            'manage_options',
            'informasi_index', //callback
            'informasi_index'
        );
    }
    }

    protected function activate()
    {

    }

    protected function deactivate()
    {

    }

}

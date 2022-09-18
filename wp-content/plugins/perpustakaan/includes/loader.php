<?php
require plugin_dir_path(__FILE__) . 'view.php';

class Loader
{

    public function __construct()
    {
        

    }

    public function run()
    {
        
        add_action('admin_menu', 'perpustakaan_index');
        add_action('admin_menu', 'perpustakaan_databuku_callback');
        function perpustakaan_index()
    {
        $view = new View('index', ['buah' => 'Strawberries']);
        $view->send();
    }

    function perpustakaan_databuku_callback()
    {
        $view = new View('index', ['buah' => 'Strawberries']);
        $view->send();
    }
        
        $this->register_plugin();
    }

    protected function register_plugin()
    {
        add_action('admin_menu', 'register');
        function register()
        {
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
            'Data Buku',
            'Data Buku',
            'manage_options',
            'perpustakaan_databuku', //callback
            'perpustakaan_databuku_callback'
        );

        add_submenu_page(
            'perpustakaan',
            'Data Buku',
            'Data Buku',
            'manage_options',
            'perpustakaan_databuku', //callback
            'perpustakaan_databuku_callback'
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

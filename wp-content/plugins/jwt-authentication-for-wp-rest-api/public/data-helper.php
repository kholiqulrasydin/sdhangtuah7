<?php

require_once get_include_path(dirname(__FILE__)) . 'wp-db.php';
class DataHelper{

    public function getUsers()
    {
        $db = new wpdb(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
        $data = $db->get_results('select * from sdhangtuah7_users');
        return $data;
    }

    public function getPosts()
    {
        $db = new wpdb(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
        $data = $db->get_results('select * from sdhangtuah7_posts');
        return $data;
    }
}
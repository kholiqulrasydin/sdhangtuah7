<?php

require_once plugin_dir_path(__FILE__) . '../View.php';

class Controller
{

    public static function get_data_snapshot(string $query)
    {
        $db = new wpdb(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
        $data = $db->get_results($query);
        return $data;
    }

    public static function update_data(string $table, array $referenceKey, array $data)
    {
        $db = new wpdb(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
        $db->update($table, $data, $referenceKey);
    }

    public static function set_data(string $table, array $data)
    {
        $db = new wpdb(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
        $db->insert($table, $data);
    }

    public static function delete_data(string $table, array $referenceKey)
    {
        $db = new wpdb(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
        $db->delete($table, $referenceKey);
    }

    public static function is_crlf_valid(?string $crlf)
    {
        if($crlf != null)
        {
            try {
                $activeCrlf = $crlf;
                $availableCrlf = wp_hash(SECURE_AUTH_KEY . get_current_user());
                if($activeCrlf == $availableCrlf)
                {
                    return true;
                }else{
                    return false;
                }
            } catch (\Throwable $th) {
                header("Location: ". site_url() ."/wp-admin");
                exit();
            }
        }else{
            status_header(403, 'Unauthorized');
            get_template_part(403);
        }
    }

    protected static function view(string $view, ?array $data)
    {
        $crlf = self::get_crlf_token();
        $view = new View($view,['data' => $data, 'crlf' => $crlf]);
        $view->send();
    }

    protected static function get_crlf_token()
    {
        $hashedCrlf = wp_hash(SECURE_AUTH_KEY . get_current_user());
        return $hashedCrlf;
    }
}
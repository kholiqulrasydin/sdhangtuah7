<?php

require_once plugin_dir_path(__FILE__) . 'controller.php';

class PengaturanController extends Controller{

    public static function index()
    {
        $bookData = self::get_data_snapshot('select * from sdhangtuah7_books');
        wp_register_script( 'datatable-tweaks', '', null, null, true);
        wp_enqueue_script( 'datatable-tweaks', null, null, null, true);
        wp_add_inline_script( 'datatable-tweaks', "
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(()=>{
                $('#storage-datatable').DataTable({
                    responsive: true
                });
            }, 2000);
            setTimeout(()=>{
                console.log('datatable already tweaked');
                console.log('adding miscellaneous button');
                var child = document.getElementById('storage-datatable_filter');
                var parent = child.parentNode;
                var children = parent.querySelectorAll('label');
                parent.innerHTML = \"<div class='row'>\" + \"<div class='col-sm-6 align-self-end'>\" + \"<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#storage-add'>Tambah Koleksi Buku</button>\" + \"</div>\" + \"<div class='col-sm-6'>\" + children[0].innerHTML + \"</div>\" + \"</div>\";
        
            }, 3000);
        });
        " );
        return self::view('pengaturan', ['bookData' => $bookData]);
    }

    public static function store($request)
    {
        $isVerified = self::is_crlf_valid($request->get_param('crlf-token'));

        if($isVerified == true)
        {
            $kelas = $request->get_param('kelas');
            $storageLink = $request->get_param('link');
            $createdAt = date('Y-m-d H:i:s');
            $updatedAt = date('Y-m-d H:i:s');
            self::set_data(
                'sdhangtuah7_books',
                [
                    'kelas' => $kelas,
                    'storage_link' => $storageLink,
                    'created_at' => $createdAt,
                    'updated_at' => $updatedAt
                ]
            );
            new WP_REST_Response("Success adding new collection", 200);
            wp_redirect( site_url() . '/wp-admin/admin.php?page=perpustakaan_setting', 301);
            exit();
        }else{
            status_header(403, 'Unauthorized');
            get_template_part(403);
        }
    }

    public static function update($request)
    {
        $isVerified = self::is_crlf_valid($request->get_param('crlf-token'));

        if($isVerified == true)
        {
            $id = $request->get_param('id');
            $kelas = $request->get_param('kelas');
            $storageLink = $request->get_param('link');
            $updatedAt = date('Y-m-d H:i:s');
            self::update_data(
                'sdhangtuah7_books',
                [
                    'kelas' => $kelas,
                    'storage_link' => $storageLink,
                    'updated_at' => $updatedAt
                ],
                ['id' => $id]
            );
            new WP_REST_Response("Success updating new collection", 200);
            wp_redirect( site_url() . '/wp-admin/admin.php?page=perpustakaan_setting', 301);
            exit();
        }else{
            status_header(403, 'Unauthorized');
            get_template_part(403);
        }
    }

    // public static function delete($request)
    // {
    //     return new WP_REST_Response($request->get_param('id'), 200);
    // }

    public static function delete($request)
    {
        $isVerified = self::is_crlf_valid($request->get_param('crlf-token'));

        if($isVerified == true)
        {
            $id = $request->get_param('id');
            self::delete_data(
                'sdhangtuah7_books',
                ['id' => $id]
            );
            wp_redirect( site_url() . '/wp-admin/admin.php?page=perpustakaan_setting', 301);
            exit();
        }else{
            status_header(403, 'Unauthorized');
            get_template_part(403);
        }
    }

}
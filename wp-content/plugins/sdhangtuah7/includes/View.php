<?php
use Jenssegers\Blade\Blade;

class View
{
    protected $fileName;
    protected $data = [];

    public function __construct(String $fileName, ?array $data)
    {
        $this->fileName = $fileName;
        if(isset($data))
        {
            $this->data = $data;
        }
    }

    public function send()
    {
        // $crlf_token = $this->crlfSet();
        // $stringPhpFile = file_get_contents(plugin_dir_path(__FILE__) . '../public/' . $this->fileName . '.php');
        // $dataSender = '<?php $data = ["buah" => "apel"]; 
        // $blocks = $dataSender . $stringPhpFile;
        // wp_register_style("bootstrap-css", "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css");
        
        wp_enqueue_style("bootstrap-css", "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css");
        wp_enqueue_style("datatable-css", "https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css");
        // wp_register_script("bootstrap-js", "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js");
        wp_enqueue_script("bootstrap-js", "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js#asyncload");
        wp_enqueue_script("jquery-js", "https://code.jquery.com/jquery-3.5.1.js#asyncload");
        wp_enqueue_script("datatable-js", "https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js#asyncload");
        wp_enqueue_script("datatable-bootstrap-js", "https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js#asyncload");
        // get_header();

        // remove multiple body

        wp_register_script( 'dummy-handle-header', '' );
        wp_enqueue_script( 'dummy-handle-header' );
        wp_add_inline_script( 'dummy-handle-header', 'console.log( "activated custom javascript content" );', null, null, true);

        wp_register_script( 'multiple-content-remover', '', null, null, true);
        wp_enqueue_script( 'multiple-content-remover', null, null, null, true);
        wp_add_inline_script( 'multiple-content-remover', "
        console.log('removing multiple content');
        
        var elements = document.getElementsByClassName('blade-content-body');
        for(var i = 0; i < elements.length; i++) {
            if(i != elements.length - 1){
                elements[i].remove();
            }
        }

        var elements = document.getElementsByClassName('blade-content-body');
        for(var i = 0; i < elements.length; i++) {
            if(i != elements.length - 1){
                elements[i].remove();
            }
        }

        console.log('multiple content has removed');
        " );

        // datatable set 

        // wp_register_script( 'datatable-tweaks', '', null, null, true);
        // wp_enqueue_script( 'datatable-tweaks', null, null, null, true);
        // wp_add_inline_script( 'datatable-tweaks', "
        // $(document).ready(function () {
        //     $('#datatable').DataTable({
        //         rowReorder: {
        //             selector: 'td:nth-child(2)'
        //         },
        //         responsive: true
        //     });
        // });
        // console.log('datatable already tweaked');
        // " );
        $blade = new Blade(plugin_dir_path(__FILE__) . '../resources/views', plugin_dir_path(__FILE__) . '../public/cache');
        // $blade = new Blade(plugin_dir_path(__FILE__) . '../resources/views', null);
        // return $blade->render('index', $this->data);
        echo "<div class='wrap blade-content-body'>" . $blade->render($this->fileName, $this->data) . "</div>";
        
    }

    public function crlfSet()
    {
        $stringKey = 'c5888337a6a82e9cec46f30428cf21a9dec19174';
        $setterKey = rand(5, 10);
        $mixedVal = $stringKey . $setterKey;
        $_SESSION['crlf_token'] = $mixedVal;
        return $mixedVal;
    }

    
    
}

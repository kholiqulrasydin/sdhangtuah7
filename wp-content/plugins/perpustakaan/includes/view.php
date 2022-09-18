<?php
use Jenssegers\Blade\Blade;

class View
{
    protected $fileName;
    protected $data = [];

    public function __construct(?String $fileName, ?array $data)
    {
        $this->fileName = $fileName;
        if(isset($data))
        {
            $this->data = $data;
        }
    }

    public function send()
    {
        $crlf_token = $this->crlfSet();
        // $stringPhpFile = file_get_contents(plugin_dir_path(__FILE__) . '../public/' . $this->fileName . '.php');
        // $dataSender = '<?php $data = ["buah" => "apel"]; 
        // $blocks = $dataSender . $stringPhpFile;
        $blade = new Blade(plugin_dir_path(__FILE__) . '../resources/views', plugin_dir_path(__FILE__) . '../public/cache');
        echo $blade->render('index', $this->data);
        
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

<?php
class log {
     
    private $log_path;

    function __construct($path)
    {
        $this->log_path = fopen($path,'a');
    }

    function __destruct()
    {
        fclose($this->log_path);
    }

    public static function directWritelog ($path,$string) {
        $log_path=fopen($path,'a');
        $string=date('d/m/Y H:i:s')." - ".$string."\n";
        fwrite($log_path,$string);
        fclose($log_path);
    }
}
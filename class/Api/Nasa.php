<?php
namespace Api;
use Api\Api;
Class Nasa extends Api {
    private $url = "";
    public function __construct($url){
        parent::__construct($url);
    }
    public function getData(){
        $data = $this->send();
        $dataArray = json_decode($data);
        if(isset($dataArray->http_error)){
            switch($dataArray->http_error){
                case 400:
                    throw new \Exception($dataArray->http_error." : ".$dataArray->error_message);
            }
            throw new \Exception($dataArray['error']['code']." : ".$dataArray['error']['message']);
        }
        return json_decode($data);
    }
}
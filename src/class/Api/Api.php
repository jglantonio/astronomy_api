<?php
namespace Api;
use http\Exception;
use PhpParser\Node\Expr\Throw_;

class Api
{
    private $ch = null;
    private $error = null;
    private $key = "";
    private $url;

    public function __construct($url = null)
    {
        $this->url = $url;
        $this->ch = curl_init();

    }

    private function setError($error)
    {
        $this->error = $error;
    }

    public function getError()
    {
        return $this->error;
    }

    public function setKey($key){
        $this->key = $key;
    }

    public function send(){
        curl_setopt($this->ch, CURLOPT_URL, $this->url);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($this->ch);
        curl_close($this->ch);
        $dataObject = json_decode($data);

        if(isset($dataObject->error)){
            $this->setError($dataObject->error);
            return false;
        }
        return json_decode($data);
    }

    public function setParams(array $data)
    {
        $request = "";
        if($this->key !== null){
            $this->url .="?api_key=".$this->key;
        }
        foreach($data as $key => $value){
            $this->url.="&$key=$value";
        }
    }

}
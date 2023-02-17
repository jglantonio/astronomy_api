<?php
namespace Api;
class Api
{
    private $ch = null;
    private $key = "";
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
        $this->ch = curl_init();

    }
    public function send(){
        curl_setopt($this->ch, CURLOPT_URL, $this->url);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($this->ch);
        curl_close($this->ch);
        return $data;
    }

    public function setParams(array $data)
    {
        $request = "";
        foreach($data as $key => $value){
            $request.="$key=$value&";
        }
        $this->url.="?".$request."api_key=".$this->key;
    }
}
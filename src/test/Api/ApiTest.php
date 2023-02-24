<?php
use \PHPUnit\Framework\TestCase;
class ApiTest extends TestCase
{
    private $api = null;
    public function constructor()
    {
        $this->api = new \Api\Api("https://api.nasa.gov/neo/rest/v1/feed");
    }

    public function testApiWithoutKey(){
        $this->constructor();
        $data = $this->api->send();
        $this->assertFalse($data);
    }

    public function testWithKey(){
        $this->constructor();
        $this->api->setKey("pyLChVua0jsWvSvdKY5RzNE1y2sTiajtgqM7oFoN");
        $data = $this->api->send();
        $this->assertIsObject($data);
    }
}
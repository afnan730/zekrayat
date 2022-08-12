<?php
include_once '/xampp/htdocs/zekrayat/models/photo.php';

class ZekrayatTest extends  PHPUnit\Framework\TestCase
{
    public function testGetPhotos()
    {
        $check = new Photo();
        $result = $check->getPath(505);
        //print_r($result);
        $this->assertFalse($result);
    }
    public function testGetAlbum()
    {
        $check = new Photo();
        $result = $check->getAlbum(5505);
        //print_r($result);
        $expected = "sudan";
        $this->assertEquals($expected, $result);
    }
    public function testGetImages()
    {
        $check = new Photo();
        $result = $check->getImages();
        //print_r($result);
        $expected = 13;
        $this->assertCount($expected, $result);
    }
}

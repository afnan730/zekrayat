<?php
include_once '/xampp/htdocs/zekrayat/models/photo.php';

class ZekrayatTest extends  PHPUnit\Framework\TestCase
{
    //Fails when the imageId passed to getPath function exists in the database and pass if it is not exist.
    public function testGetPhotos()
    {
        $check = new Photo();
        $result = $check->getPath(505);
        //print_r($result);
        $this->assertFalse($result);
    }
    //pass if the expected value of album is same as to the returned from database of a given imageId.
    public function testGetAlbum()
    {
        $check = new Photo();
        $result = $check->getAlbum(5505);
        //print_r($result);
        $expected = "sudan";
        $this->assertEquals($expected, $result);
    }
    //pass if the number of photos retrieved from database matches the expected value.
    public function testGetImages()
    {
        $check = new Photo();
        $result = $check->getImages();
        //print_r($result);
        $expected = 13;
        $this->assertCount($expected, $result);
    }
}

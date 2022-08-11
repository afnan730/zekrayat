<?php
require_once '../models/photo.php';


$photo = new Photo();
$photos = $photo->getImages();

<?php
require_once '../models/photo.php';

$photo = new Photo();
$photos = $photo->getPhotos($userdata['userid']);

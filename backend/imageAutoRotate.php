<?php

function orientation($exif_data)
{
	foreach($exif_data as $key => $val)
	{
		if(strtolower($key) == "orientation")
		{
			return $val;
		}
	}
}

function orientation_flag($orientation)
{
	switch($orientation):
	case 1:
	return 0;
	case 8:
	return 90;
	case 3:
	return 180;
	case 6:
	return 270;
	endswitch;

}

$rotated_filename=$source;
$exif_data=exif_read_data($source);

$orientation=orientation($exif_data);
$degrees=orientation_flag($orientation);
ini_set('gd.jpeg_ignore_warning', true);
error_reporting(E_ALL & ~E_NOTICE);
$image_data=imagecreatefromjpeg($source);
$image_rotate=imagerotate($image_data, $degrees, 0);

imagejpeg($image_rotate, $rotated_filename);
imagedestroy($image_data);
imagedestroy($image_rotate);

?>
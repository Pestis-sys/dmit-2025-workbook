<?php

$message = $message ?? '';
$img_title = $_POST['img-title'] ?? "";
$img_description = $_POST['img-description'] ?? '';

if (isset($_POST['submit'])) :
    // must validate title and description!!!!
    // var_dump($_FILES);
    $filename = $_FILES['img-file']['name'];
    $filesize = $_FILES['img-file']['size'];
    $file_tempname = $_FILES['img-file']['tmp_name'];

    if ($_FILES['img-file']['error'] === 0) :

        $file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allowed_extensions = array('avif', 'jpg', 'jpeg', 'webp', 'png');

        if (in_array($file_extension, $allowed_extensions)) :
            
            if ($filesize < 2048000) :

                $new_filename = uniqid('', TRUE) . ".$file_extension";

                $file_destination = 'images/full/'. $new_filename;

                if (!is_dir('images/full/')) :
                    mkdir('images/full/', 0777, TRUE);
                endif;

                if (!is_dir('images/thumbs/')) :
                    mkdir('images/thumbs/', 0777, TRUE);
                endif;

                move_uploaded_file($file_tempname, $file_destination);

                switch ($file_extension) {
                    case 'avif':
                        $src_image = imagecreatefromavif($file_destination);
                        break;
                    case 'png' :
                        $src_image = imagecreatefrompng($file_destination);
                        break;
                    case 'webp':
                        $src_image = imagecreatefromwebp($file_destination);
                        break;
                    case 'jpg':
                    case 'jpeg':
                        $src_image = imagecreatefromjpeg($file_destination);
                        break;
                    default:
                        exit('Unsupported file format.');
                }

                list($original_width, $original_height) = getimagesize($file_destination);

                if ($original_width > $original_height) :
                    $target_width = 1280;
                    $target_height = 720;
                elseif ($original_height > $original_width) :
                    $target_width = 720;
                    $target_height = 1280;
                else :
                    $target_height = $target_width = 720;
                endif;

                $scale_x = $target_width / $original_width;
                $scale_y = $target_height / $original_height;
                $scale = max($scale_x, $scale_y);

                $new_width = ceil($original_width * $scale);
                $new_height = ceil($original_height * $scale);

                $temp_image = imagecreatetruecolor($new_width, $new_height);

                imagecopyresampled($temp_image, $src_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height );

                $x_offset = ($new_width - $target_width) / 2;
                $y_offset = ($new_height - $target_height) / 2;

                $final_image = imagecreatetruecolor($target_width, $target_height);

                imagecopy($final_image, $temp_image, 0,0,$x_offset, $y_offset, $target_width, $target_height);

                 switch ($file_extension) {
                    case 'avif':
                        $src_image = imageavif($final_image, $file_destination);
                        break;
                    case 'png' :
                        $src_image = imagepng($final_image, $file_destination);
                        break;
                    case 'webp':
                        $src_image = imagewebp($final_image, $file_destination);
                        break;
                    case 'jpg':
                    case 'jpeg':
                        $src_image = imagejpeg($final_image, $file_destination);
                        break;
                    default:
                        exit('Unsupported file format.');
                }

            endif; // end of filesize
        endif; // end of in array for extension
    endif; // end of error is 0
endif; // end of isset post


?>
<?php

trait Helper {
    public function imageUpload($file)
    {

        $target_dir = "../uploads/";

        $randNumber = rand(100, 20000);
        $target_file = $target_dir . $randNumber . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


        $check = getimagesize($file["tmp_name"]);


        if ($check !== false) {
            //  echo "File is an image - " . $check["mime"] . ".";

        } else {
            return "File is not an image.";
        }


// Check if file already exists
        if (file_exists($target_file)) {
            return "Sorry, file already exists.";
        }

// Check file size
        if ($file["size"] > 5000000) {
            return "Sorry, your file is too large.";

        }

// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

        }


        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $randNumber . $file["name"];
        } else {
            return "Sorry, there was an error uploading your file.";
        }

    }


    public function limit_text($text, $len) {
        if (strlen($text) < $len) {
            return $text;
        }
        $text_words = explode(' ', $text);
        $out = null;


        foreach ($text_words as $word) {
            if ((strlen($word) > $len) && $out == null) {

                return substr($word, 0, $len) . "...";
            }
            if ((strlen($out) + strlen($word)) > $len) {
                return $out . "...";
            }
            $out.=" " . $word;
        }
        return $out;
    }
}
<?php

namespace App\Controllers;

class HomeController extends Controller
{

    public function index()
    {
        return $this->view("layout");
    }

    public function change_photo()
    {
        return $this->view("change_photo");
    }

    public function upload()
    {


        $target_dir = __DIR__ . "/../../public/uploads/";
        $target_file = $target_dir . "photo.jpg";
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

            return $this->json(["msg" => "nice"]);
        }
        return $this->json(["msg" => "gagal"]);
    }
}

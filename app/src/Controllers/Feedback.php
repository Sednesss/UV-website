<?php

namespace App\Src\Controllers;

class Feedback
{
    public function index($body)
    {
        echo json_encode($body);
    }
}

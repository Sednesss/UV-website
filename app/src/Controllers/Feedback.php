<?php

namespace App\Src\Controllers;

use App\Src\Services\Email;

class Feedback
{
    public function index($body)
    {
        Email::send('123');
        echo json_encode($body);
    }
}

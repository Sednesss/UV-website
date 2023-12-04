<?php

use App\Src\Controllers\Feedback;
use App\Src\Services\Router;

Router::page('/', 'main');
Router::page('/en', 'main');
Router::post('/api/v1/feedback', Feedback::class, 'index');

Router::enable();
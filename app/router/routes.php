<?php

use App\Src\Controllers\Feedback;
use App\Src\Services\Router;

Router::page('/', 'main', 'ru');
Router::page('/en', 'main', 'en');
Router::post('/api/v1/feedback', Feedback::class, 'index');

Router::enable();
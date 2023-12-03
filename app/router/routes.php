<?php

use App\Src\Services\Router;

Router::page('/', 'main');
Router::page('/en', 'main');

Router::enable();
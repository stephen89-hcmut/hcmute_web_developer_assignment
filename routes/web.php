<?php

declare(strict_types=1);

use App\Core\Router;

/** @var Router $router */
$router->get('/', static function (): void {
    echo 'Computer Store is ready.';
});

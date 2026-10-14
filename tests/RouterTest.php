<?php

declare(strict_types=1);

namespace Tests;

use App\Core\Router;
use PHPUnit\Framework\TestCase;

final class RouterTest extends TestCase
{
    public function testDispatchesRegisteredGetRoute(): void
    {
        $router = new Router();
        $router->get('/', static function (): void {
            echo 'ready';
        });

        ob_start();
        $router->dispatch('GET', '/');
        $output = ob_get_clean();

        self::assertSame('ready', $output);
    }

    public function testReturnsNotFoundForUnknownRoute(): void
    {
        $router = new Router();

        ob_start();
        $router->dispatch('GET', '/missing');
        $output = ob_get_clean();

        self::assertSame(404, http_response_code());
        self::assertSame('404 - Page not found', $output);
    }
}

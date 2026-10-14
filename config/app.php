<?php

declare(strict_types=1);

return [
    'name' => 'Computer Store',
    'environment' => $_ENV['APP_ENV'] ?? 'local',
    'debug' => filter_var($_ENV['APP_DEBUG'] ?? false, FILTER_VALIDATE_BOOL),
];

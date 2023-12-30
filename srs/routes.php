<?php
    return [
        '~^$~' => [srs\Controllers\MainController::class, 'main'],
        '~^articles/(\d+)$~' => [srs\Controllers\ArticlesController::class, 'view'],
    ];
?>
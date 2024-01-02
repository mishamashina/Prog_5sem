<?php
    return [
        '~^$~' => [srs\Controllers\MainController::class, 'main'],
        '~^articles/(\d+)$~' => [srs\Controllers\ArticlesController::class, 'view'],
        '~^articles/(\d+)/edit$~' => [srs\Controllers\ArticlesController::class, 'edit'],
        '~^articles/add$~' => [srs\Controllers\ArticlesController::class, 'add'],
    ];
?>
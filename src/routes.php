<?php

return [
    // '~^hello/(.*)$~'=>[src\Controllers\MainController::class, 'sayHello'],
    // '~^$~'=>[src\Controllers\MainController::class, 'main'],
    '~^$~'=>[src\Controllers\ArticleController::class, 'index'],
    '~^article/(\d)$~'=>[src\Controllers\ArticleController::class, 'show'],
    '~^article/update/(\d)$~'=>[src\Controllers\ArticleController::class, 'update'],
    '~^article/update_comment/(\d)$~'=>[src\Controllers\ArticleController::class, 'update_comment'],
    '~^article/edit/(\d)$~'=>[src\Controllers\ArticleController::class, 'edit'],
    '~^article/delete/(\d)$~'=>[src\Controllers\ArticleController::class, 'delete'],
    '~^article/store$~'=>[src\Controllers\ArticleController::class, 'store'],
    '~^article/create$~'=>[src\Controllers\ArticleController::class, 'create'],
    '~^article/(\d)/comments$~'=>[src\Controllers\ArticleController::class, 'create_comment'],
    '~^article/(\d)/comments/(\d)$~'=>[src\Controllers\ArticleController::class, 'show_comment'],
    '~^article/store_comment$~'=>[src\Controllers\ArticleController::class, 'store_comment'],
    '~^article/(\d)/comments/(\d)/edit$~'=>[src\Controllers\ArticleController::class, 'edit_comment'],
];
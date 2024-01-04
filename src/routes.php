<?php

return [
    // '~^hello/(.*)$~'=>[src\Controllers\MainController::class, 'sayHello'],
    // '~^$~'=>[src\Controllers\MainController::class, 'main'],
    '~^$~'=>[src\Controllers\ArticleController::class, 'index'],
    '~^article/(\d)$~'=>[src\Controllers\ArticleController::class, 'show'],
    '~^article/update/(\d)$~'=>[src\Controllers\ArticleController::class, 'update'],
    '~^article/edit/(\d)$~'=>[src\Controllers\ArticleController::class, 'edit'],
    '~^article/delete/(\d)$~'=>[src\Controllers\ArticleController::class, 'delete'],
    '~^article/store/(\d)$~'=>[src\Controllers\ArticleController::class, 'store'],
    '~^article/create/(\d)$~'=>[src\Controllers\ArticleController::class, 'create'],
    '~^article/(\d)/comments$~'=>[src\Controllers\ArticleController::class, 'create'],
    '~^article/comments/(\d)/edit$~'=>[src\Controllers\ArticleController::class, 'edit_comment'],
    '~^article/update_comment/(\d)$~'=>[src\Controllers\ArticleController::class, 'update_comment'],
];
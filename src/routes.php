<?php

return [
    // '~^hello/(.*)$~'=>[src\Controllers\MainController::class, 'sayHello'],
    // '~^$~'=>[src\Controllers\MainController::class, 'main'],
    '~^$~'=>[src\Controllers\ArticleController::class, 'index'],
    '~^article/(\d)$~'=>[src\Controllers\ArticleController::class, 'show'],
    '~^article/update/(\d)$~'=>[src\Controllers\ArticleController::class, 'update'],
    '~^article/edit/(\d)$~'=>[src\Controllers\ArticleController::class, 'edit'],
    '~^article/delete/(\d)$~'=>[src\Controllers\ArticleController::class, 'delete'],
    '~^article/store$~'=>[src\Controllers\ArticleController::class, 'store'],
    '~^article/create$~'=>[src\Controllers\ArticleController::class, 'create'],
    // '~^article/comments/(\d)/edit$~'=>[src\Controllers\ArticleController::class, 'edit_comment'],
    // '~^article/update_comment/(\d)$~'=>[src\Controllers\ArticleController::class, 'update_comment'],

    '~^comment/create/(\d)$~' => [src\Controllers\CommentController::class,'create'],
    '~^comment/store$~' => [src\Controllers\CommentController::class,'store'],
    '~^comment/delete/(\d)$~' => [src\Controllers\CommentController::class,'delete'],
    '~^comment/edit/(\d)$~' => [src\Controllers\CommentController::class,'edit'],
    '~^comment/update/(\d)$~' => [src\Controllers\CommentController::class,'update'],
];
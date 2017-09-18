<?php

return [
    'role_structure' => [
        'administrator' => [
            'dashboard' => 'v',
            'user' => 'c,v,u,d',
            'role' => 'c,v,u,d',
        ],
        'moderator' => [
            'post' => 'c,u,d',
            'comment' => 'v,u,d',
            'forum-topic' => 'u,d',
            'topic-reply' => 'u,d',
            'forum-category' => 'c,u,d'
        ],
        'user' => [
            'post' => 'v',
            'comment' => 'c',
            'own-comment' => 'u',
            'own-post' => 'u',
            'forum-topic' => 'c,v',
            'topic-reply' => 'c',
            'own-topic-reply' => 'u',
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'v' => 'view',
        'u' => 'update',
        'd' => 'delete'
    ]
];

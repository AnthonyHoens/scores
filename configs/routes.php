<?php
return [
    [
        'method'=>'POST',
        'action'=>'store',
        'resource'=>'match',
        'controller'=>'Match',
        'callback'=>'store'
    ],
    [
        'method'=>'POST',
        'action'=>'store',
        'resource'=>'team',
        'controller'=>'Team',
        'callback'=>'store'
    ],
    [
        'method'=>'GET',
        'action'=>'',
        'resource'=>'',
        'controller'=>'Dashboard',
        'callback'=>'index'
    ],
    [
        'method'=>'GET',
        'action'=>'create',
        'resource'=>'team',
        'controller'=>'Team',
        'callback'=>'create'
    ],
    [
        'method'=>'GET',
        'action'=>'create',
        'resource'=>'match',
        'controller'=>'Match',
        'callback'=>'create'
    ],
    [
        'method' => 'GET',
        'action' => 'view',
        'resource' => 'login-form',
        'controller' => 'Login',
        'callback' => 'create'
    ],
    [
        'method' => 'GET',
        'action' => 'view',
        'resource' => 'register-form',
        'controller' => 'Register',
        'callback' => 'create'
    ],
    [
        'method' => 'POST',
        'action' => 'check',
        'resource' => 'login',
        'controller' => 'Login',
        'callback' => 'check'
    ],
    [
        'method' => 'POST',
        'action' => 'logout',
        'resource' => 'user',
        'controller' => 'Login',
        'callback' => 'delete'
    ],
];
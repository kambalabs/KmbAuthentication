<?php
return [
    'service_manager' => [
        'invokables' => [
            'Zend\Authentication\AuthenticationService' => 'Zend\Authentication\AuthenticationService',
        ],
        'aliases' => [
            'kmbAuthService' => 'Zend\Authentication\AuthenticationService',
        ],
    ],
    'listeners' => [
        'kmbAuthListener',
    ],
];

<?php
return [
    'adminEmail' => 'admin@email.com',
    'roles' => ['admin', 'front', 'agent', 'representative','manager','sales director','international director'],
    'languages' => ['pl', 'en'],
    'languagesDisplay' => ['pl', 'en'],
    'icon-framework' => 'bsg',
    'containerComponents' => require __DIR__ . '/containerComponents.php',
    'secretKey' => 'IASD77asdj**dkdl%*',
    'getResponseApiKEy' => 'x6jm830hxgpgi1l0v7ls4o8wvi3ry2gj',
    'recaptcha' => [
        'siteKey' => '6LeTfKsbAAAAAKHoxDeBQeyOxgKMkwP15azy0Itf',
        'secretKey' => '6LeTfKsbAAAAAMNBg3YtKf4F258qChEW-4I2ZwUp'
    ],
    'recaptcha2' => [
        'siteKey' => '6LeA-CUbAAAAACVgBPUjUY2PfRo3HOaK3gVzVyPj',
        'secretKey' => '6LeA-CUbAAAAAErEaliKQa3oKkP7uVxJCP6x7mg2'
    ],
    'knowledgeTest' => require __DIR__ . '/knowledgeTest.php'
];

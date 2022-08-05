<?php 
return [ 
    'client_id' => 'AfXH-XXaWsYi9zGtnQnU6RZONcEZceQ5zCPYYsRgMtsVavwzUw5mT6qtU6yZRVeXzwkyU9s0eoTyGUBQ',
	'secret' => 'EDfsEHJCJ6Ug8fddZoL9DIeVMF0n46RmHWc1QINGCvnGJXrtadpYwrsTILJJXl8r3dKnWIxb5fCE_TZN',
    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 2000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];
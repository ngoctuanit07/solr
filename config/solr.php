<?php

return [
    'endpoint' => [
        'localhost' => [
            'host' => env('SOLR_HOST', 'ec2-18-188-210-125.us-east-2.compute.amazonaws.com'),
            'port' => env('SOLR_PORT', '8983'),
           // 'path' => env('SOLR_PATH', '/solr/'),
            'core' => env('SOLR_CORE', 'collectionData')
        ]
    ]
];
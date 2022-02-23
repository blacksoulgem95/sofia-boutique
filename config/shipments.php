<?php

return [
    'packlink' => [
        'api_key' => env('PACKLINK_API_KEY')
    ],
    'from' => [
        'name' => env('SHIPMENTS_FROM_NAME'),
        'line_1' => env('SHIPMENTS_FROM_LINE_1'),
        'line_2' => env('SHIPMENTS_FROM_LINE_2'),
        'zip' => env('SHIPMENTS_FROM_LINE_ZIP'),
        'city' => env('SHIPMENTS_FROM_LINE_CITY'),
        'state' => env('SHIPMENTS_FROM_LINE_STATE'),
        'country' => env('SHIPMENTS_FROM_LINE_COUNTRY')
    ]
];

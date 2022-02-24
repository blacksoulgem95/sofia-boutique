<?php

return [
  'address' => 'Address',
  'addresses' => 'Addresses',
  'contact' => 'Contact info',
    'form' => [
        'name_line' => 'Name and Surname',
        'co_line' => 'C/O or Company Name',
        'line_1' => 'First line of address',
        'line_2' => 'Second line of address',
        'zip' => 'Zip / Postal code',
        'city' => 'City',
        'state' => 'State / Region',
        'country' => 'Country',
        'phone_number' => 'Phone Number'
    ],
    'errors' => [
        'must_not_be_billing' => "You cannot perform this action on a billing address",
        'do_not_own' => "You seem not to be the owner of the specified address"
    ]
];

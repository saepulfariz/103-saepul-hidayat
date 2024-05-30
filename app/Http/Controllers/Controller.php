<?php

namespace App\Http\Controllers;

use App\Models\Organization;

abstract class Controller
{
    public function __construct()
    {
        $organization = Organization::findOrFail(1);
        $data  = [
            'organization' => $organization
        ];

        session($data);
    }
}

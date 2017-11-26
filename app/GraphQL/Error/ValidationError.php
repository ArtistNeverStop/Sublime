<?php

namespace App\GraphQL\Error;

use Illuminate\Validation\ValidationException;
use GraphQL\Error\ClientAware;
// use GraphQL\Error\Error;

// implements ClientAware
class ValidationError extends ValidationException implements ClientAware
{
    // public $validator;

    // public function __construct($message, $validator)
    // {
    //     $this->validator = $validator;
    // }

    public function isClientSafe()
    {
        return true;
    }

    public function getCategory()
    {
        return 'Validation';
    }
}

<?php

namespace App\Validators;

use Illuminate\Validation\Validator;

class ExistsOrZeroRule extends Validator
{

    public function validateExistsOrZero($attribute, $value)
    {
        if($value == 0) {
            return true;
        }
        else {
            $validator = Validator::make([$attribute => $value], [
                $attribute => 'exists:' . implode(",", $parameters)
            ]);
            return !$validator->fails();
        }
    }
}
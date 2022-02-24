<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class OfUser implements Rule
{
    private $EntityClass;
    private $columnName;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($EntityClass, $columnName)
    {
        $this->EntityClass = $EntityClass;
        $this->columnName = $columnName;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $id = Auth::user()->id;
        $entity = $this->EntityClass::find($value);
        $cn = $this->columnName;

        return id_equals($id, $entity->$cn);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.not_owned');
    }
}

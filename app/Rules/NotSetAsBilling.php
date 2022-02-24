<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class NotSetAsBilling implements Rule
{
    private $user_id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $user = User::find($this->user_id);

        if (!isset($user)) {
            return false;
        }

        return !id_equals($user->billing_address_id, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('address.errors.must_not_be_billing');
    }

}

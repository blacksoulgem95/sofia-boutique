<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;

class notSetAsBilling implements Rule, DataAwareRule
{
    private $user_id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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

        if (!isset($user)) return false;

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

    public function setData($data)
    {
        dd($data);
        $this->user_id = $data[0];
        return $this;
    }
}

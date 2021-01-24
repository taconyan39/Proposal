<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\User;
use Hash;

class UserPasswordRule implements Rule
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
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // dd($this);
        //現在のパスワードを取得
        $current_password = User::find($this->user_id)->password;
        if(Hash::check($value, $current_password)){
            return true;
        }
        
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}

<?php

namespace App\Http\Requests;

use App\Models\User;

class UpdateUserRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('PATCH')) {
            return $this->filterWithModelConfiguration(User::class, User::getPatchRules());
        } elseif ($this->isMethod('PUT')) {
            return $this->filterWithModelConfiguration(User::class, User::getPutRules());
        } else {
            // @fixme Api documentation generator method "GET" for update... return PUT method rules
            return $this->filterWithModelConfiguration(User::class, User::getPutRules());
        }
    }
}

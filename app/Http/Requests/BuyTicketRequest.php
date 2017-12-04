<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->merge(['price' => $this->route()->artistplace->price_per_person]);
        return [
            'price' => 'numeric|between:0,'.\Auth::user()->credit
        ];
    }
}

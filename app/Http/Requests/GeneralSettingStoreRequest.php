<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'site_title'=>'required|string|max:255',
            'site_address'=>'required|string|max:255',
            'site_phone'=>'required|numeric|digits:11',
            'site_facebook_link'=>'nullable|string|max:255',
            'site_twitter_link'=>'nullable|string|max:255',
            'site_instagram_link'=>'nullable|string|max:255',
            'site_description'=>'nullable|string',
        ];
    }
}

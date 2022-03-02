<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        return [
            'name' => 'required|string|unique:products',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:1',
            'brand_id' => 'required',
            'desc' => 'required|max:400',
            'images' => 'required',
            'images.*' => 'mimes:png, jpg, jpeg',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('required', ['attr' => __('name')]),
            'name.string' => __('string', ['attr' => __('name')]),
            'price.required' => __('required', ['attr' => __('price')]),
            'price.numeric' => __('numeric', ['attr' => __('price')]),
            'price.min' => __('min', ['attr' => __('price'), 'value' => '0']),
            'quantity.required' => __('required', ['attr' => __('quantity')]),
            'quantity.numeric' => __('numeric', ['attr' => __('quantity')]),
            'quantity.min' => __('min', ['attr' => __('quantity'), 'value' => '0']),
            'desc.required' => __('required', ['attr' => __('desc')]),
            'desc.max' => __('max', ['attr' => __('desc'), 'value' => '400']),
            'brand_id.required' => __('required', ['attr' => __('brand')]),
            'images.required' => __('required', ['attr' => __('img')]),
            'images.*.mimes' => __('mimes', ['attr' => __('img')]),
        ];
    }
}
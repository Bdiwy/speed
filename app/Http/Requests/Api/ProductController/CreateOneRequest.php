<?php

namespace App\Http\Requests\Api\ProductController;

use App\Models\Brand;
use App\Models\Company;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateOneRequest extends FormRequest
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
            'name' => ['required','string','max:100'],
            'description' => ['required','string','max:1000'],
            'price' => ['required','numeric','min:0'],
            'company_id' => [Rule::exists(Company::make()->getTable()),'id'],
            'brand_id' => [Rule::exists(Brand::make()->getTable()),'id'],
        ];
    }
}

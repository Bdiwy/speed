<?php

namespace App\Http\Requests\Api\ProductController;

use App\Models\Brand;
use App\Models\Company;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOneRequest extends FormRequest
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
            'description' => ['sometimes','string','max:1000'],
            'price' => ['sometimes','numeric','min:0'],
            'company_id' => ['required', Rule::exists(Company::make()->getTable()),'id'],
            'brand_id' => ['required', Rule::exists(Brand::make()->getTable()),'id'],
        ];
    }
}

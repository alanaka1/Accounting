<?php

namespace App\Http\Requests\Project\Accounting;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $categoryId = $this->route('id') ?? $this->route('category');

        if (is_object($categoryId)) {
            $categoryId = $categoryId->id;
        }

        return [

            'name'          => ['required', 'string', 'max:100',

                Rule::unique('categories', 'name')->where(function ($query) {
                        return $query->where('user_id', Auth::id())->where('type', $this->input('type'));
                    })->ignore($categoryId),
            ],

            'type'          => ['required', Rule::in(['receipt', 'payment'])],
            'description'   => ['nullable', 'string', 'max:255',],
            'status'        => ['nullable', 'integer', 'in:0,1',],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'اسم التصنيف مطلوب.',
            'name.max'          => 'اسم التصنيف يجب ألا يتجاوز 100 حرف.',
            'name.unique'       => 'هذا التصنيف موجود مسبقاً.',
            'type.required'     => 'نوع التصنيف مطلوب.',
            'type.in'           => 'نوع التصنيف غير صحيح.',
            'description.max'   => 'الوصف يجب ألا يتجاوز 255 حرف.',
            'status.in'         => 'حالة التصنيف غير صحيحة.',
        ];
    }
}
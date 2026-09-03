<?php

namespace App\Http\Requests\Project\Accounting;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Contracts\Validation\ValidationRule;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $categoryId = $this->route('id') ?? $this->route('category');

        if (is_object($categoryId)) {
            $categoryId = $categoryId->id;
        }

        return [
            'name' => [ 'required', 'string', 'max:100',

                Rule::unique('categories', 'name')
                    ->where(function ($query) {
                        return $query
                            ->where('user_id', Auth::id())
                            ->where('type', $this->type);
                    })
                    ->ignore($categoryId),
            ],

            'type' => ['required', Rule::in(['receipt', 'payment']),],
            'description' => [ 'nullable', 'string', 'max:255'],
            'status' => ['nullable', 'integer', 'in:0,1',],
        ];
    }
}

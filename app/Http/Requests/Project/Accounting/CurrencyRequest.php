<?php

namespace App\Http\Requests\Project\Accounting;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Contracts\Validation\ValidationRule;

class CurrencyRequest extends FormRequest
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
        $currencyId = $this->route('currency')
            ?? $this->route('id');

        if (is_object($currencyId)) {
            $currencyId = $currencyId->id;
        }

        return [
            'name' => ['required', 'string', 'max:100'],
            'code' => ['required', 'string', 'max:10',

                Rule::unique('currencies', 'code')
                    ->where(function ($query) {
                        return $query->where(
                            'user_id',
                            Auth::id()
                        );
                    })
                    ->ignore($currencyId),
            ],

            'symbol' => ['nullable','string','max:10'],
            'decimal_places' => [ 'required', 'integer', 'min:0', 'max:8'],
            'is_default' => ['nullable', 'boolean'],
            'status' => [ 'nullable', 'integer', 'in:0,1'],
        ];
    }

    /**
     * Validation messages.
     */
    public function messages(): array
    {
        return [
            'name.required'             => 'اسم العملة مطلوب.',
            'name.max'                  => 'اسم العملة يجب ألا يتجاوز 100 حرف.',
            'code.required'             => 'رمز العملة مطلوب.',
            'code.max'                  => 'رمز العملة يجب ألا يتجاوز 10 أحرف.',
            'code.unique'               => 'هذه العملة موجودة مسبقاً.',
            'symbol.max'                => 'رمز العملة يجب ألا يتجاوز 10 أحرف.',
            'decimal_places.required'   => 'عدد المنازل العشرية مطلوب.',
            'decimal_places.integer'    => 'عدد المنازل العشرية يجب أن يكون رقماً صحيحاً.',
            'decimal_places.min'        => 'عدد المنازل العشرية لا يمكن أن يكون أقل من صفر.',
            'decimal_places.max'        => 'عدد المنازل العشرية لا يمكن أن يتجاوز 8.',
            'status.in'                 => 'حالة العملة غير صحيحة.',
        ];
    }
}

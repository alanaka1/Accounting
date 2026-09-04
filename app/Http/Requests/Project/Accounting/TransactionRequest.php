<?php

namespace App\Http\Requests\Project\Accounting;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
        return [

            'currency_id' => ['required', 'integer',
                Rule::exists('currencies', 'id')->where(function ($query) {
                        return $query->where('user_id', Auth::id())->whereNull('deleted_at');
                    }),
            ],

            'category_id' => ['nullable', 'integer',
                Rule::exists('categories', 'id')->where(function ($query) {
                        return $query->where('user_id', Auth::id())->where('type', $this->input('type'))->whereNull('deleted_at');
                    }),
            ],

            'type'              => ['required', Rule::in(['receipt', 'payment',])],
            // 'payment_method'    => ['required', 'in:cash,card,bank_transfer'],
            'amount'            => ['required', 'numeric', 'gt:0'],
            'description'       => ['nullable', 'string', 'max:255'],
            'transaction_date'  => ['required', 'date'],
            'note'              => ['nullable', 'string'],
            'status'            => ['nullable', 'integer', 'in:0,1',],
        ];
    }

    public function messages(): array
    {
        return [
            'currency_id.required' =>'العملة مطلوبة.',
            'currency_id.exists' =>'العملة المحددة غير موجودة.',
            'category_id.exists' =>'التصنيف المحدد غير صحيح أو لا يتوافق مع نوع الحركة.',
            'type.required' =>'نوع الحركة مطلوب.',
            'type.in' =>'نوع الحركة يجب أن يكون مقبوضات أو مدفوعات.',
            'amount.required' =>'المبلغ مطلوب.',
            'amount.numeric' =>'المبلغ يجب أن يكون رقماً.',
            'amount.gt' =>'المبلغ يجب أن يكون أكبر من صفر.',
            'description.max' =>'البيان يجب ألا يتجاوز 255 حرف.',
            'transaction_date.required' =>'تاريخ الحركة مطلوب.',
            'transaction_date.date' =>'تاريخ الحركة غير صحيح.',
            'status.in' =>'حالة الحركة غير صحيحة.',
        ];
    }
}

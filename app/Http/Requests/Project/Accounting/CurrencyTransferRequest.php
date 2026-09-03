<?php

namespace App\Http\Requests\Project\Accounting;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class CurrencyTransferRequest extends FormRequest
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

            'from_currency_id' => [ 'required', 'integer',
                Rule::exists('currencies', 'id')->where(function ($query) {
                        return $query->where('user_id', Auth::id());
                    }),
            ],

            'from_amount' => [ 'required', 'numeric', 'gt:0'],
            'to_currency_id' => [ 'required', 'integer', 'different:from_currency_id',

                Rule::exists('currencies', 'id')->where(function ($query) {
                        return $query->where('user_id', Auth::id());
                    }),
            ],

            'to_amount' => ['required', 'numeric', 'gt:0'],
            'exchange_rate' => ['nullable', 'numeric', 'gt:0'],
            'transfer_date' => ['required', 'date'],
            'description' => ['nullable', 'string', 'max:255'],
            'note' => ['nullable', 'string'],
            'status' => ['nullable', 'integer', 'in:0,1'],
        ];
    }

    public function messages(): array
    {
        return [
            'from_currency_id.required' =>'العملة المراد التحويل منها مطلوبة.',
            'from_currency_id.exists' =>'العملة المراد التحويل منها غير موجودة.',
            'from_amount.required' =>'المبلغ المراد تحويله مطلوب.',
            'from_amount.numeric' =>'مبلغ التحويل يجب أن يكون رقماً.',
            'from_amount.gt' =>'مبلغ التحويل يجب أن يكون أكبر من صفر.',
            'to_currency_id.required' =>'العملة المراد التحويل إليها مطلوبة.',
            'to_currency_id.exists' =>'العملة المراد التحويل إليها غير موجودة.',
            'to_currency_id.different' =>'لا يمكن التحويل من العملة إلى نفس العملة.',
            'to_amount.required' =>'المبلغ المستلم مطلوب.',
            'to_amount.numeric' =>'المبلغ المستلم يجب أن يكون رقماً.',
            'to_amount.gt' =>'المبلغ المستلم يجب أن يكون أكبر من صفر.',
            'exchange_rate.numeric' =>'سعر الصرف يجب أن يكون رقماً.',
            'exchange_rate.gt' =>'سعر الصرف يجب أن يكون أكبر من صفر.',
            'transfer_date.required' =>'تاريخ التحويل مطلوب.',
            'transfer_date.date' =>'تاريخ التحويل غير صحيح.',
            'description.max' =>'البيان يجب ألا يتجاوز 255 حرف.',
            'status.in' =>'حالة التحويل غير صحيحة.',
        ];
    }
}

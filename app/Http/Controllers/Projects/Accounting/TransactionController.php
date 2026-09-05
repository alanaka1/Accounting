<?php

namespace App\Http\Controllers\Projects\Accounting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Project\Accounting\{Transaction, Currency, Category, Account};
use App\Http\Requests\Project\Accounting\TransactionRequest;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'roles']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type = request('type');

        $transactions = Transaction::with(['currency', 'category', 'transfer'])->where('user_id', Auth::id())->when(
                in_array($type, ['receipt', 'payment']),
                function ($query) use ($type) {
                    $query->where('type', $type);
                }
            )->orderBy('transaction_date', 'DESC')->orderBy('id', 'DESC')->get();

        return view('Project.Accounting.Transaction.index', compact('transactions', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = request('type');

        if (!in_array($type, ['receipt', 'payment'])) {
            $type = null;
        }

        $accounts = Account::with(['bank', 'currency'])->where('user_id', Auth::id())->where('status', 1)->orderBy('name')->get();
        $categories = Category::where('user_id', Auth::id())->where('status', 1)->when($type, function ($query) use ($type) {
                $query->where('type', $type);
            })->orderBy('name')->get();

        return view('Project.Accounting.Transaction.form',compact('accounts', 'categories', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionRequest $request)
    {
        $data = $request->validated();

        $account = Account::where('user_id', Auth::id())->findOrFail($data['account_id']);

        Transaction::create([
            'user_id'           => Auth::id(),
            'account_id'        => $account->id,
            'currency_id'       => $account->currency_id,
            'category_id'       => $data['category_id'] ?? null,
            'type'              => $data['type'],
            // 'payment_method'    => $data['payment_method'],
            'amount'            => $data['amount'],
            'description'       => $data['description'] ?? null,
            'transaction_date'  => $data['transaction_date'],
            'note'              => $data['note'] ?? null,
            'transfer_id'       => null,
            'status'            => $data['status'] ?? 1,
        ]);

        return redirect(route('accounting.transactions.index'))->with('success', 'تم إضافة الحركة المالية بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($transaction)
    {
        $transaction = Transaction::where('user_id', Auth::id())->findOrFail($transaction);

        /*
         * الحركة الناتجة عن تحويل عملة
         * يجب تعديلها من قسم تحويل العملات.
         */
        if ($transaction->transfer_id) {

            return redirect(route('accounting.currency-transfers.edit', $transaction->transfer_id))->with('error', 'هذه الحركة مرتبطة بتحويل عملة، يجب تعديل التحويل نفسه.');
        }

        $accounts   = Account::with(['bank', 'currency'])->where('user_id', Auth::id())->where('status', 1)->orderBy('name')->get();
        $categories = Category::where('user_id', Auth::id())->where('type', $transaction->type)->orderBy('name')->get();
        $type = $transaction->type;

        return view('Project.Accounting.Transaction.form', compact('transaction', 'accounts', 'categories', 'type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransactionRequest $request, $transaction)
    {
         $transaction = Transaction::where('user_id', Auth::id())->findOrFail($transaction);

        if ($transaction->transfer_id) {
            return redirect()->route('accounting.currency-transfers.edit', $transaction->transfer_id)->with('error', 'لا يمكن تعديل حركة مرتبطة بتحويل عملة من هنا.');
        }

        $data = $request->validated();

        $account = Account::where('user_id', Auth::id())
            ->findOrFail($data['account_id']);

        $transaction->update([
            'account_id'        => $account->id,
            'currency_id'       => $account->currency_id,
            'category_id'       => $data['category_id'] ?? null,
            'type'              => $data['type'],
            'amount'            => $data['amount'],
            'description'       => $data['description'] ?? null,
            'transaction_date'  => $data['transaction_date'],
            'note'              => $data['note'] ?? null,
            'status'            => $data['status'] ?? $transaction->status,
        ]);


        return redirect(route('accounting.transactions.index'))->with('success', 'تم تعديل الحركة المالية بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($transaction)
    {
        $transaction = Transaction::where('user_id', Auth::id())->findOrFail($transaction);

        /** منع حذف حركة تحويل بشكل منفصل. */
        if ($transaction->transfer_id) {

            return redirect()->back()->with('error', 'هذه الحركة مرتبطة بتحويل عملة. احذف عملية التحويل من قسم تحويل العملات.');
        }

        $transaction->delete();

        return redirect(route('accounting.transactions.index'))->with('success', 'تم نقل الحركة إلى سلة المحذوفات.');
    }

        /**
     * Change transaction status.
     */
    public function updateStatus($id)
    {
        $transaction = Transaction::where('user_id', Auth::id())->findOrFail($id);

        if ($transaction->transfer_id) {
            return redirect()->back()->with('error', 'لا يمكن تغيير حالة حركة مرتبطة بتحويل عملة بشكل منفصل.');
        }

        $transaction->update(['status' => $transaction->status == 1 ? 0 : 1]);

        return redirect()->back()->with('success', 'تم تغيير حالة الحركة المالية بنجاح.');
    }

    /**
     * Display deleted transactions.
     */
    public function trash()
    {
        $transactions = Transaction::onlyTrashed()->with(['currency', 'category', 'transfer'])->where('user_id', Auth::id())->orderBy('deleted_at', 'DESC')->get();

        return view('Project.Accounting.Transaction.trash', compact('transactions'));
    }
}

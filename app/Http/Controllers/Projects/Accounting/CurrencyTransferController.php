<?php

namespace App\Http\Controllers\Project\Accounting;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Auth, DB};
use App\Models\Project\Accounting\CurrencyTransfer;
use App\Models\Project\Accounting\{Transaction, Currency};
use App\Http\Requests\Project\Accounting\CurrencyTransferRequest;

class CurrencyTransferController extends Controller
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
        $transfers = CurrencyTransfer::with(['fromCurrency', 'toCurrency'])->where('user_id', Auth::id())->orderBy('transfer_date', 'DESC')->orderBy('id', 'DESC')->get();
        return view('Project.Accounting.CurrencyTransfer.index', compact('transfers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $currencies = Currency::where('user_id', Auth::id())->where('status', 1)->orderBy('code')->get();
        return view('Project.Accounting.CurrencyTransfer.form', compact('currencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CurrencyTransferRequest $request)
    {
        DB::transaction(function () use ($request) {

            $data = $request->validated();

            /*
             * 1 FROM = X TO
             */
            $exchangeRate = $data['exchange_rate']
                ?? ($data['to_amount'] / $data['from_amount']);

            $transfer = CurrencyTransfer::create([
                'user_id'          => Auth::id(),
                'from_currency_id' => $data['from_currency_id'],
                'from_amount'      => $data['from_amount'],
                'to_currency_id'   => $data['to_currency_id'],
                'to_amount'        => $data['to_amount'],
                'exchange_rate'    => $exchangeRate,
                'transfer_date'    => $data['transfer_date'],
                'description'      => $data['description'] ?? null,
                'note'             => $data['note'] ?? null,
                'status'           => $data['status'] ?? 1,
            ]);

            /*
             * العملة الخارجة = مدفوعات
             */
            Transaction::create([
                'user_id'          => Auth::id(),
                'currency_id'      => $transfer->from_currency_id,
                'category_id'      => null,
                'type'             => 'payment',
                'amount'           => $transfer->from_amount,
                'description'      => $transfer->description ?? 'تحويل عملة',
                'transaction_date' => $transfer->transfer_date,
                'note'             => $transfer->note,
                'transfer_id'      => $transfer->id,
            ]);

            /*
             * العملة الداخلة = مقبوضات
             */
            Transaction::create([
                'user_id'          => Auth::id(),
                'currency_id'      => $transfer->to_currency_id,
                'category_id'      => null,
                'type'             => 'receipt',
                'amount'           => $transfer->to_amount,
                'description'      => $transfer->description ?? 'تحويل عملة',
                'transaction_date' => $transfer->transfer_date,
                'note'             => $transfer->note,
                'transfer_id'      => $transfer->id,
            ]);
        });

        return redirect()->route('accounting.currency-transfers.index')->with('success', 'تم تحويل العملة بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CurrencyTransfer $currencyTransfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($currencyTransfer)
    {
        $transfer = CurrencyTransfer::where('user_id', Auth::id())->findOrFail($currencyTransfer);
        $currencies = Currency::where('user_id', Auth::id())->where('status', 1)->orderBy('code')->get();

        return view('Project.Accounting.CurrencyTransfer.form', compact('transfer', 'currencies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CurrencyTransferRequest $request, $currencyTransfer)
    {
        $transfer = CurrencyTransfer::where('user_id', Auth::id())->findOrFail($currencyTransfer);

        DB::transaction(function () use ($request, $transfer) 
        
        {
            $data = $request->validated();
            $exchangeRate = $data['exchange_rate'] ?? ($data['to_amount'] / $data['from_amount']);
            $transfer->update([
                'from_currency_id' => $data['from_currency_id'],
                'from_amount' => $data['from_amount'],
                'to_currency_id' => $data['to_currency_id'],
                'to_amount' => $data['to_amount'],
                'exchange_rate' => $exchangeRate,
                'transfer_date' => $data['transfer_date'],
                'description' => $data['description'] ?? null,
                'note' => $data['note'] ?? null,
                'status' => $data['status'] ?? $transfer->status,
            ]);

            /** تحديث حركة المدفوع **/

            Transaction::where('transfer_id', $transfer->id)->where('type', 'payment')->update([
                    'currency_id' => $transfer->from_currency_id,
                    'amount' => $transfer->from_amount,
                    'description' => $transfer->description ?? 'تحويل عملة',
                    'transaction_date' => $transfer->transfer_date,
                    'note' => $transfer->note,
                ]);

            /** تحديث حركة المقبوض **/

            Transaction::where('transfer_id', $transfer->id)->where('type', 'receipt')->update([
                    'currency_id' => $transfer->to_currency_id,
                    'amount' => $transfer->to_amount,
                    'description' => $transfer->description ?? 'تحويل عملة',
                    'transaction_date' => $transfer->transfer_date,
                    'note' => $transfer->note,
                ]);
        });

        return redirect()->route('accounting.currency-transfers.index')->with('success', 'تم تعديل تحويل العملة بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($currencyTransfer)
    {
        $transfer = CurrencyTransfer::where('user_id', Auth::id())->findOrFail($currencyTransfer);
        DB::transaction(function () use ($transfer) {
            /** حذف الحركات المرتبطة حتى لا تبقى
             * محسوبة ضمن الرصيد. */
            Transaction::where( 'transfer_id', $transfer->id)->delete();
            $transfer->delete();
        });
        return redirect()->route('accounting.currency-transfers.index')->with( 'success', 'تم نقل عملية التحويل إلى سلة المحذوفات.');
    }

    /**
     * Change transfer status.
     */
    public function updateStatus($id)
    {
        $transfer = CurrencyTransfer::where( 'user_id', Auth::id())->findOrFail($id);
        $transfer->update(['status' => $transfer->status == 1 ? 0 : 1]);
        return redirect()->back()->with('success', 'تم تغيير حالة عملية التحويل بنجاح.');
    }

    /**
     * Display deleted transfers.
     */
    public function trash()
    {
        $transfers = CurrencyTransfer::onlyTrashed()->with(['fromCurrency', 'toCurrency'])->where('user_id', Auth::id())->orderBy('deleted_at', 'DESC')->get();
        return view('Project.Accounting.CurrencyTransfer.trash', compact('transfers'));
    }
}

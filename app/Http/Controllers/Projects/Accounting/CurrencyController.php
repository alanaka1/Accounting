<?php

namespace App\Http\Controllers\Projects\Accounting;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{DB, Auth};
use App\Models\Project\Accounting\Currency;
use App\Http\Requests\Project\Accounting\CurrencyRequest;

class CurrencyController extends Controller
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
        $currencies = Currency::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
         return view('Project.Accounting.Currency.index', compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Project.Accounting.Currency.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CurrencyRequest $request)
    {
         DB::transaction(function () use ($request) {

            $data = $request->validated();

            /*
             * إذا العملة الجديدة Default
             * نشيل Default عن باقي العملات.
             */
            if ($request->boolean('is_default')) {
                Currency::where('user_id', Auth::id())->update(['is_default' => false]);
            }

            Currency::create([
                'user_id'        => Auth::id(),
                'name'           => $data['name'],
                'code'           => strtoupper($data['code']),
                'symbol'         => $data['symbol'] ?? null,
                'decimal_places' => $data['decimal_places'] ?? 2,
                'is_default'     => $request->boolean('is_default'),
                'status'         => $data['status'] ?? 1,
            ]);
        });

        return redirect(route('accounting.currencies.index'))->with('success', 'تم إضافة العملة بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($currency)
    {
        $currency = Currency::where('user_id', Auth::id())->findOrFail($currency);
        return view('Project.Accounting.Currency.form', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CurrencyRequest $request, $currency)
    {
         $currency = Currency::where('user_id', Auth::id())->findOrFail($currency);

        DB::transaction(function () use ($request, $currency) {

            $data = $request->validated();

            if ($request->boolean('is_default')) {
                Currency::where('user_id', Auth::id())->where('id', '!=', $currency->id)->update(['is_default' => false]);
            }

            $currency->update([
                'name'           => $data['name'],
                'code'           => strtoupper($data['code']),
                'symbol'         => $data['symbol'] ?? null,
                'decimal_places' => $data['decimal_places'] ?? 2,
                'is_default'     => $request->boolean('is_default'),
                'status'         => $data['status'] ?? $currency->status,
            ]);
        });

        return redirect()->route('accounting.currencies.index')->with('success', 'تم تعديل العملة بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($currency)
    {
        $currency = Currency::where('user_id', Auth::id())->findOrFail($currency);
        /** منع حذف العملة الافتراضية.*/
        if ($currency->is_default) {
            return redirect()->back()->with('error', 'لا يمكن حذف العملة الافتراضية.');
        }

        $currency->delete();

        return redirect()->route('accounting.currencies.index')->with('success', 'تم نقل العملة إلى سلة المحذوفات.');
    }

    /**
     * Update currency status.
     */
    public function updateStatus($id)
    {
        $currency = Currency::where('user_id', Auth::id())->findOrFail($id);

        $currency->update(['status' => $currency->status == 1 ? 0 : 1]);

        return redirect()->back()->with('success', 'تم تغيير حالة العملة بنجاح.');
    }

    /**
     * Display deleted currencies.
     */
    public function trash()
    {
        $currencies = Currency::onlyTrashed()->where('user_id', Auth::id())->orderBy('deleted_at', 'DESC')->get();
        return view('Project.Accounting.Currency.trash', compact('currencies'));
    }
}

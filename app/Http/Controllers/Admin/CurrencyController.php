<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Currency\CurrencyStoreRequest;
use App\Http\Requests\Currency\CurrencyUpdateRequest;
use App\Models\Currency;
use App\Models\SettingCurrency;
use App\Services\CurrencyService;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Current;

class CurrencyController extends Controller
{
    private $currencyService;
    public function __construct(CurrencyService $currencyService){
        $this->currencyService = $currencyService;
    }

    public function index(){
        return view('admin.pages.currency.index');
    }

    public function dataTable(){
        return $this->currencyService->dataTable();
    }

    public function store(CurrencyStoreRequest $request){
        return $this->currencyService->storeCurrency($request);
    }


    public function edit(Request $request){
        $data = $this->currencyService->findCurrency($request->currency_id);
        return response()->json($data);
    }

    public function update(CurrencyUpdateRequest $request){
        return $this->currencyService->updateCurrency($request);
    }

    public function destroy(Request $request){
        return $this->currencyService->destroy($request->id);
    }
}

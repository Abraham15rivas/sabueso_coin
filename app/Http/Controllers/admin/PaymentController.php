<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        return view('data.payments.index');
    }

    public function getPayments()
    {
        return Payment::orderBy('name', 'asc')->get()->toJson();
    }
    public function store(Request $request)
    {
        return Payment::create($request->all());
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, Payment $payment)
    {
        $payment->update($request->all());
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);       
        $payment->delete();
    }
}

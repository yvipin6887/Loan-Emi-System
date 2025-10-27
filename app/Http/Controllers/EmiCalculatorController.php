<?php

namespace App\Http\Controllers;

use App\Models\LoanDetail;
use Illuminate\Http\Request;

class EmiCalculatorController extends Controller
{
    public function showForm()
    {
        return view('emi.calculator');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'clientid' => 'required|integer',
            'loan_amount' => 'required|numeric',
            'num_of_payment' => 'required|integer',
            'first_payment_date' => 'required|date',
            'last_payment_date' => 'required|date',
        ]);

        LoanDetail::create($validated);

        return redirect()->route('loan.index')->with('success', 'Loan saved!');
    }
}

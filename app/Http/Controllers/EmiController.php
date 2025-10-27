<?php

namespace App\Http\Controllers;

use App\Repositories\LoanRepository;
use App\Services\EmiService;
use Illuminate\Support\Facades\DB;

class EmiController extends Controller
{
    public function index(LoanRepository $loanRepo, EmiService $emiService)
    {
        $loans = $loanRepo->getAll();
        $emiService->generateEmiTable($loans);
        $emiData = DB::table('emi_details')->get();
        return view('emi.process', compact('emiData'));
    }

    public function process(LoanRepository $loanRepo, EmiService $emiService)
    {
        $loans = $loanRepo->getAll();
        $emiService->generateEmiTable($loans);
        $emiData = DB::table('emi_details')->get();
        return view('emi.process', compact('emiData'));
    }
}

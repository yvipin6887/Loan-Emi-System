<?php
namespace App\Http\Controllers;

use App\Repositories\LoanRepository;

class LoanController extends Controller
{
    public function index(LoanRepository $repo)
    {
        $loans = $repo->getAll();
        return view('loan.index', compact('loans'));
    }
}

<?php

namespace App\Repositories;

use App\Models\LoanDetail;

class LoanRepository
{
    public function getAll()
    {
        return LoanDetail::all();
    }
}

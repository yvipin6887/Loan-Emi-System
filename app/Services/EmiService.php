<?php

namespace App\Services;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EmiService
{
    public function generateEmiTable($loans)
    {
        $minDate = Carbon::parse($loans->min('first_payment_date'))->startOfMonth();
        $maxDate = Carbon::parse($loans->max('last_payment_date'))->startOfMonth();

        $months = [];
        while ($minDate <= $maxDate) {
            $months[] = $minDate->format('Y_M');
            $minDate->addMonth();
        }

        DB::statement('DROP TABLE IF EXISTS emi_details');

        $columns = implode(', ', array_map(fn($m) => "`$m` DECIMAL(10,2) DEFAULT 0.00", $months));
        DB::statement("CREATE TABLE emi_details (clientid INT, $columns)");

        foreach ($loans as $loan) {
            $emi = round($loan->loan_amount / $loan->num_of_payment, 2);
            $start = Carbon::parse($loan->first_payment_date)->startOfMonth();
            $end = Carbon::parse($loan->last_payment_date)->startOfMonth();

            $clientMonths = [];
            while ($start <= $end) {
                $clientMonths[] = $start->format('Y_M');
                $start->addMonth();
            }

            $emiValues = array_fill_keys($months, 0.00);
            $total = 0;
            foreach ($clientMonths as $i => $month) {
                $emiValues[$month] = $i == count($clientMonths) - 1
                    ? round($loan->loan_amount - $total, 2)
                    : $emi;
                $total += $emiValues[$month];
            }

            DB::table('emi_details')->insert(array_merge(['clientid' => $loan->clientid], $emiValues));
        }
    }
}

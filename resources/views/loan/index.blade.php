<!-- resources/views/loan/index.blade.php -->
<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-4">
    <div class="p-6 bg-white rounded shadow">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">All Loan Records</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 text-sm sm:text-base">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border text-left font-medium text-gray-700 whitespace-nowrap">Client ID</th>
                        <th class="px-4 py-2 border text-left font-medium text-gray-700 whitespace-nowrap">Payments</th>
                        <th class="px-4 py-2 border text-left font-medium text-gray-700 whitespace-nowrap">Start Date</th>
                        <th class="px-4 py-2 border text-left font-medium text-gray-700 whitespace-nowrap">End Date</th>
                        <th class="px-4 py-2 border text-left font-medium text-gray-700 whitespace-nowrap">Loan Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($loans as $loan)
                    <tr class="border-t hover:bg-gray-50 text-center">
                        <td class="px-4 py-2 border whitespace-nowrap">{{ $loan->clientid }}</td>
                        <td class="px-4 py-2 border whitespace-nowrap">{{ $loan->num_of_payment }}</td>
                        <td class="px-4 py-2 border whitespace-nowrap">{{ \Carbon\Carbon::parse($loan->first_payment_date)->format('Y-m-d') }}</td>
                        <td class="px-4 py-2 border whitespace-nowrap">{{ \Carbon\Carbon::parse($loan->last_payment_date)->format('Y-m-d') }}</td>
                        <td class="px-4 py-2 border whitespace-nowrap">${{ number_format($loan->loan_amount, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</x-app-layout>

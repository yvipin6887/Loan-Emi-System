<!-- resources/views/emi/process.blade.php -->
<x-app-layout>
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <form method="POST" action="{{ route('emi.store') }}" class="max-w-md mx-auto p-6 bg-white shadow rounded space-y-4">
            @csrf

            <input
                type="number"
                name="clientid"
                value="{{ old('clientid') }}"
                placeholder="Client ID"
                class="w-full px-3 py-2 border rounded"
                required
            />

            <input
                type="number"
                name="loan_amount"
                value="{{ old('loan_amount') }}"
                placeholder="Loan Amount"
                class="w-full px-3 py-2 border rounded"
                required
            />

            <input
                type="number"
                name="num_of_payment"
                value="{{ old('num_of_payment') }}"
                placeholder="Number of Payments"
                class="w-full px-3 py-2 border rounded"
                required
            />

            <div>
                <label for="first_payment_date" class="block text-sm font-medium mb-1">First Payment Date</label>
                <input
                    type="date"
                    name="first_payment_date"
                    value="{{ old('first_payment_date') }}"
                    class="w-full px-3 py-2 border rounded"
                    required
                />
            </div>

            <div>
                <label for="last_payment_date" class="block text-sm font-medium mb-1">Last Payment Date</label>
                <input
                    type="date"
                    name="last_payment_date"
                    value="{{ old('last_payment_date') }}"
                    class="w-full px-3 py-2 border rounded"
                    required
                />
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition cursor-pointer">
                Save EMI
            </button>
        </form>
    </div>
</x-app-layout>

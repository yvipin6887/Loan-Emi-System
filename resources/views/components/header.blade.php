<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-gray-800">Loan EMI Admin</h1>
        <nav class="space-x-4">
            <a href="{{ route('loan.index') }}" class="text-sm text-gray-600 hover:text-blue-600">Loan Details</a>
            <a href="{{ route('emi.index') }}" class="text-sm text-gray-600 hover:text-blue-600">Process EMI</a>
            <a href="{{ route('emi.calculator') }}" class="text-sm text-gray-600 hover:text-blue-600">EMI Calculator</a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="text-sm text-red-500 hover:text-red-700">Logout</button>
            </form>
        </nav>
    </div>
</header>

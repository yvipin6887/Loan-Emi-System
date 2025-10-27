<!-- resources/views/emi/process.blade.php -->
<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-4 w-full">

    <div class="p-6 bg-white rounded shadow">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-4 gap-4">
            <h2 class="text-xl font-semibold text-gray-800">EMI Details Processing</h2>
            <form method="POST" action="{{ route('emi.process') }}">
                @csrf
                <button type="submit" class="bg-blue-600 cursor-pointer text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Process Data
                </button>
            </form>
        </div>

        @if(!empty($emiData) && count($emiData))
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 text-sm sm:text-base">
                <thead class="bg-gray-100">
                    <tr>
                        @foreach(array_keys((array)$emiData[0]) as $key)
                            <th class="px-4 py-2 border text-left font-medium text-gray-700 whitespace-nowrap">
                                {{ $key }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($emiData as $row)
                    <tr class="border-t hover:bg-gray-50">
                        @foreach((array)$row as $val)
                            <td class="px-4 py-2 border text-center whitespace-nowrap">
                                {{ is_numeric($val) ? number_format($val, 2) : $val }}
                            </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
</x-app-layout>

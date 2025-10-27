<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loan EMI Admin Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">
    <form method="POST" action="{{ route('login') }}" class="bg-white p-8 rounded shadow-md w-full max-w-sm">
        @csrf

        <h2 class="text-2xl font-bold mb-2 text-center">Loan EMI Admin</h2>
        <p class="text-sm text-gray-500 mb-6 text-center">Sign in to manage loan details</p>

        @if($errors->any())
            <div class="mb-4 text-red-600 text-sm text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <input
            type="text"
            name="email"
            placeholder="Username"
            value="{{ old('email') }}"
            class="w-full mb-4 px-3 py-2 border rounded"
            required
        />

        <input
            type="password"
            name="password"
            placeholder="Password"
            class="w-full mb-4 px-3 py-2 border rounded"
            required
        />

        <button
            type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition"
        >
            Sign In
        </button>

        <p class="text-xs text-gray-400 mt-4 text-center">
            Default credentials: <strong>developer@example.com / Test@Password123#</strong>
        </p>
    </form>
</body>
</html>

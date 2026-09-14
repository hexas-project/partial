<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Inter', sans-serif;
}

body {
    background-color: #f7fafc;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    width: 100%;
    max-width: 400px;
    margin: 0 auto;
}

/* Form Styles */
.bg-white {
    background-color: #fff;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.text-center {
    text-align: center;
}

.text-sm {
    font-size: 0.875rem;
}

.font-semibold {
    font-weight: 600;
}

.text-gray-700 {
    color: #4a5568;
}

.mt-1 {
    margin-top: 0.25rem;
}

.block {
    display: block;
}

.w-full {
    width: 100%;
}

.p-2 {
    padding: 0.5rem;
}

.border {
    border-width: 1px;
}

.border-gray-300 {
    border-color: #e2e8f0;
}

.rounded-md {
    border-radius: 0.375rem;
}

.focus\:ring-indigo-500:focus {
    box-shadow: 0 0 0 2px rgba(67, 56, 202, 0.5);
}

.focus\:border-indigo-500:focus {
    border-color: #4c51bf;
}

.bg-indigo-600 {
    background-color: #4c51bf;
}

.text-white {
    color: #fff;
}

.hover\:bg-indigo-700:hover {
    background-color: #434190;
}

.text-red-500 {
    color: #e53e3e;
}

.text-xs {
    font-size: 0.75rem;
}

.mt-2 {
    margin-top: 0.5rem;
}

.ml-2 {
    margin-left: 0.5rem;
}

.px-6 {
    padding-left: 1.5rem;
    padding-right: 1.5rem;
}

.py-2 {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}

.flex {
    display: flex;
}

.items-center {
    align-items: center;
}

.justify-between {
    justify-content: space-between;
}

.mb-4 {
    margin-bottom: 1rem;
}

#session-status {
    color: green;
    font-weight: bold;
}

    </style>
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-6 rounded-lg shadow-md w-96" style="width:370px;">
            <!-- Logo -->
            <div class="text-center mb-6">
                <img src="{{asset('images/new logo.png')}}" alt="Logo" width="140px" class="max-w-xs mx-auto">
            </div>

            <!-- New Text Below the Logo -->
            <div class="text-center mb-6">
                <p class="text-lg font-semibold text-gray-700"> Partial</p>
            </div>

            <!-- Session Status (optional) -->
            <div id="session-status" class="mb-4"></div>

            <form method="POST" action="{{ route('login') }}" >
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                    <input  id="email" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
                    <p class="text-red-500 text-xs mt-2" id="email-error"></p>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                    <input id="password" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password" required autocomplete="current-password" />
                    <p class="text-red-500 text-xs mt-2" id="password-error"></p>
                </div>

                <!-- Remember Me -->
                <div class="mb-4 flex items-center" >
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600">Remember me</label>
                    {{-- <a href="{{route('register')}}" style="margin-left: 10px">Register</a> --}}
                </div>

                <div class="flex items-center justify-between">
                    <a href="{{ route('password.request') }}" class="text-sm text-gray-600 hover:text-gray-900">Forgot your password?</a>

                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Log in</button>
                </div>
            </form>
        </div>
    </div>
    
</body>

</html>

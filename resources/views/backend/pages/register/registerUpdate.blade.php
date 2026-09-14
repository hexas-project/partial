@extends('index')

@section('content')
<style>
    /* SAME CSS AS LOGIN PAGE */
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
    body { background-color: #f7fafc; display: flex; justify-content: center; align-items: center; height: 100vh; }
    .container { width: 100%; max-width: 400px; margin: 0 auto; }
    .bg-white { background-color: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0px 4px 10px rgba(0,0,0,0.1); width:500px;}
    .text-center { text-align: center; }
    .text-sm { font-size: 0.875rem; }
    .font-semibold { font-weight: 600; }
    .text-gray-700 { color: #4a5568; }
    .mt-1 { margin-top: 0.25rem; }
    .block { display: block; }
    .w-full { width: 100%; }
    .p-2 { padding: 0.5rem; }
    .border { border-width: 1px; }
    .border-gray-300 { border-color: #e2e8f0; }
    .rounded-md { border-radius: 0.375rem; }
    .focus\:ring-indigo-500:focus { box-shadow: 0 0 0 2px rgba(67,56,202,0.5); }
    .focus\:border-indigo-500:focus { border-color: #4c51bf; }
    .bg-indigo-600 { background-color: #4c51bf; }
    .text-white { color: #fff; }
    .hover\:bg-indigo-700:hover { background-color: #434190; }
    .text-red-500 { color: #e53e3e; }
    .text-xs { font-size: 0.75rem; }
    .mt-2 { margin-top: 0.5rem; }
    .ml-2 { margin-left: 0.5rem; }
    .px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
    .py-2 { padding-top: 0.5rem; padding-bottom: 0.5rem; }
    .flex { display: flex; }
    .items-center { align-items: center; }
    .justify-between { justify-content: space-between; }
    .mb-4 { margin-bottom: 1rem; }
    .mainsec{display: flex; justify-content: center;}
</style>

<div class="flex items-center justify-center min-h-screen mainsec">
    <div class="bg-white p-6 rounded-lg shadow-md w-96">
        <!-- Logo -->
        <div class="text-center mb-6">
            <img src="https://theitaid.com/assets/img/uploaded/202211291731logo5.png" alt="Logo" class="max-w-xs mx-auto">
        </div>

        <!-- New Text Below the Logo -->
        <div class="text-center mb-5">
            <p class="text-lg font-semibold text-gray-700">The IT Aid, CD IELTS Course Preparation</p>
        </div>

        <!-- Register Form -->
        <form method="POST" action="{{ route('users.update') }}" style="margin-top:20px;">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-semibold text-gray-700">Name</label>
                <input id="name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                       type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                <input id="email" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                       type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                <input id="password" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                       type="password" name="password" required autocomplete="new-password">
                @error('password')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700">Confirm Password</label>
                <input id="password_confirmation" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                       type="password" name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Role -->
            <div class="mb-4">
                <label for="role" class="block text-sm font-semibold text-gray-700">Role</label>
                <select id="role" name="role" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="0" {{ old('role') == '0' ? 'selected' : '' }}>Student</option>
                    <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

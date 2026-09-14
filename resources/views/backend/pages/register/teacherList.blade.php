@extends('index')

<style>
    /* SAME CSS AS LOGIN PAGE */
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

    .bg-white {
        background-color: #fff;
        padding: 2rem;
        border-radius: 8px;
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
</style>

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Teacher List</h2>
            <!-- Button to trigger the modal -->
            {{-- <button type="button" class="btn btn-success ms-auto px-6 py-2" data-bs-toggle="modal" data-bs-target="#createUserModal">
      Create User
   </button> --}}
        </div>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Registered Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->role == 1)
                                Admin
                            @elseif($user->role == 2)
                                Teacher
                            @else
                                Student
                            @endif
                        </td>
                        <td>{{ $user->created_at?->format('d M Y') }}</td>
                        <td>
                            <!-- Edit Button to open the Edit Modal -->
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editUserModal{{ $user->id }}">
                                Edit
                            </button>
                            <!-- Delete Form -->
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit User Modal -->
                    <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1"
                        aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">


                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center mb-6">
                                        <img src="https://theitaid.com/assets/img/uploaded/202211291731logo5.png"
                                            alt="Logo" class="max-w-xs mx-auto">
                                    </div>
                                    <!-- Edit Form -->
                                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                                        @csrf


                                        <!-- Name -->
                                        <div class="mb-4">
                                            <label for="name"
                                                class="block text-sm font-semibold text-gray-700">Name</label>
                                            <input id="name"
                                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                                                type="text" name="name" value="{{ old('name', $user->name) }}"
                                                required>
                                            @error('name')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Email -->
                                        <div class="mb-4">
                                            <label for="email"
                                                class="block text-sm font-semibold text-gray-700">Email</label>
                                            <input id="email"
                                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                                                type="email" name="email" value="{{ old('email', $user->email) }}"
                                                required>
                                            @error('email')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Password -->
                                        <div class="mb-4">
                                            <label for="password"
                                                class="block text-sm font-semibold text-gray-700">Password</label>
                                            <input id="password"
                                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                                                type="password" name="password">
                                            <small class="text-gray-500">Leave blank to keep current password</small>
                                            @error('password')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="mb-4">
                                            <label for="password_confirmation"
                                                class="block text-sm font-semibold text-gray-700">Confirm Password</label>
                                            <input id="password_confirmation"
                                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                                                type="password" name="password_confirmation">
                                            @error('password_confirmation')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Role -->
                                        <div class="mb-4">
                                            <label for="role"
                                                class="block text-sm font-semibold text-gray-700">Role</label>
                                            <select id="role" name="role"
                                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                                <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Student
                                                </option>
                                                <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Admin
                                                </option>
                                                <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Teacher
                                                </option>

                                            </select>
                                            @error('role')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="flex items-center justify-between">
                                            <button type="submit"
                                                class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <tr>
                        <td colspan="5">No registered users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>



    <!-- Modal for Create User Form -->
    {{-- <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Register Form Inside Modal -->
         <div class="bg-white p-6 rounded-lg  w-96">
            <!-- Logo -->
            <div class="text-center mb-6">
                <img src="https://theitaid.com/assets/img/uploaded/202211291731logo5.png" alt="Logo" class="max-w-xs mx-auto">
            </div>

            <!-- New Text Below the Logo -->
            <div class="text-center  mb-5 ">
                <p class="text-lg font-semibold text-gray-700">The IT Aid, CD IELTS Course Preparation</p>
            </div>

            <!-- Register Form -->
            <form method="POST" action="{{ route('register.user.create') }}" style="margin-top:20px;">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold text-gray-700">Name</label>
                    <input id="name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                    <input id="email" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                    <input id="password" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password" required autocomplete="new-password">
                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password_confirmation" required autocomplete="new-password">
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
                    <option value="2" {{ old('role') == '2' ? 'selected' : '' }}>Teacher</option>
                </select>
                @error('role')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

                <div class="flex items-center justify-between">
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900"></a>

                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Register</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div> --}}
@endsection

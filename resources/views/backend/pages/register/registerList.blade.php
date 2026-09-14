@extends('index')

@section('content')
<div class="container mt-5">
    <h2>Registered Users</h2>
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
                    <td>{{ $user->role == 1 ? 'Admin' : 'Student' }}</td>
                    <td>{{ $user->created_at?->format('d M Y') }}</td>
                    <td>
                       
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No registered users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

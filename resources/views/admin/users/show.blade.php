@extends('layouts.admin')

@section('title', 'User Details')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">User Details</h1>
        <a href="{{ route('admin.users.index') }}" class="btn btn-ghost">Back to Users</a>
    </div>

    <div class="card bg-base-100 shadow-xl min-w-xl mx-auto">
        <div class="card-body">
            <h2 class="card-title text-2xl mb-4">{{ $user->name }}</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <span class="font-bold block text-sm opacity-70">Email</span>
                    <span class="text-lg">{{ $user->email }}</span>
                </div>

                <div>
                    <span class="font-bold block text-sm opacity-70">Role</span>
                    <div class="badge {{ $user->isAdmin() ? 'badge-primary' : 'badge-ghost' }} mt-1">
                        {{ $user->role->label() }}
                    </div>
                </div>

                <div>
                    <span class="font-bold block text-sm opacity-70">User ID</span>
                    <span class="text-sm font-mono">{{ $user->id }}</span>
                </div>

                <div>
                    <span class="font-bold block text-sm opacity-70">Joined Date</span>
                    <span class="text-lg">{{ $user->created_at->format('F d, Y h:i A') }}</span>
                </div>
            </div>

            <div class="card-actions justify-end mt-6">
                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-secondary">Edit User</a>

                @if (Auth::id() !== $user->id)
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline"
                        onsubmit="return confirm('Are you sure you want to delete this user?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-error text-white">Delete User</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection

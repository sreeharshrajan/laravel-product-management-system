@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Edit User</h1>
        <a href="{{ route('admin.users.index') }}" class="btn btn-ghost">Back to Users</a>
    </div>

    <div class="card bg-base-100 shadow-xl min-w-xl mx-auto">
        <div class="card-body">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-control w-full mb-4">
                    <label class="label">
                        <span class="label-text">Name</span>
                    </label>
                    <input type="text" name="name" placeholder="John Doe"
                        class="input input-bordered w-full @error('name') input-error @enderror"
                        value="{{ old('name', $user->name) }}" required />
                    @error('name')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="form-control w-full mb-4">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" name="email" placeholder="john@example.com"
                        class="input input-bordered w-full @error('email') input-error @enderror"
                        value="{{ old('email', $user->email) }}" required />
                    @error('email')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="form-control w-full mb-4">
                    <label class="label">
                        <span class="label-text">Password (Leave blank to keep current)</span>
                    </label>
                    <input type="password" name="password" placeholder="********"
                        class="input input-bordered w-full @error('password') input-error @enderror" minlength="8" />
                    @error('password')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="form-control w-full mb-6">
                    <label class="label">
                        <span class="label-text">Role</span>
                    </label>
                    <select name="role" class="select select-bordered w-full @error('role') select-error @enderror"
                        required>
                        @foreach (App\Enums\UserRole::cases() as $role)
                            <option value="{{ $role->value }}"
                                {{ old('role', $user->role->value) === $role->value ? 'selected' : '' }}>
                                {{ $role->label() }}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="card-actions justify-end">
                    <button type="submit" class="btn btn-primary">Update User</button>
                </div>
            </form>
        </div>
    </div>
@endsection

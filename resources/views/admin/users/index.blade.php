@extends('layouts.admin')

@section('title', 'Users')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Users</h1>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create User</a>
    </div>
    <div class="card bg-base-100/80 backdrop-blur-xl shadow-xl border border-white/10 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead>
                    <tr class="border-b border-white/10 bg-base-200/50">
                        <th class="text-[11px] uppercase tracking-widest opacity-60 font-bold py-4">User Details</th>
                        <th class="text-[11px] uppercase tracking-widest opacity-60 font-bold py-4">Role</th>
                        <th class="text-[11px] uppercase tracking-widest opacity-60 font-bold py-4">Joined</th>
                        <th class="text-right text-[11px] uppercase tracking-widest opacity-60 font-bold py-4 pr-6">Actions
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-white/5">
                    @foreach ($users as $user)
                        <tr class="hover:bg-primary/5 transition-colors group">
                            <td class="py-3 px-4">
                                <div class="flex items-center gap-3">
                                    <div class="avatar placeholder">
                                        <div
                                            class="bg-primary/20 text-primary rounded-lg w-9 h-9 flex items-center justify-center border border-primary/10">
                                            <span
                                                class="text-xs font-bold leading-none">{{ substr($user->name, 0, 1) }}</span>
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <span
                                            class="text-sm font-bold group-hover:text-primary transition-colors">{{ $user->name }}</span>
                                        <span class="text-[11px] opacity-50">{{ $user->email }}</span>
                                    </div>
                                </div>
                            </td>

                            <td class="py-3">
                                <span
                                    class="badge {{ $user->isAdmin() ? 'badge-primary' : 'badge-ghost opacity-70' }} badge-sm font-bold text-[10px] uppercase tracking-tighter">
                                    {{ $user->role->label() }}
                                </span>
                            </td>

                            <td class="py-3">
                                <span
                                    class="text-xs opacity-70 font-medium">{{ $user->created_at->format('M d, Y') }}</span>
                            </td>

                            <td class="py-3">
                                <div class="flex justify-start items-center gap-1">
                                    <a href="{{ route('admin.users.show', $user->id) }}"
                                        class="btn btn-ghost btn-xs btn-square hover:bg-primary/20 transition-all"
                                        title="View">
                                        <i data-lucide="eye" class="w-3 h-3"></i>
                                    </a>
                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                        class="btn btn-ghost btn-xs btn-square hover:bg-primary/20 transition-all"
                                        title="Edit">
                                        <i data-lucide="edit-3" class="w-3 h-3"></i>
                                    </a>
                                    @if (Auth::id() !== $user->id)
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                            class="inline" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-ghost btn-xs btn-square text-error/60 hover:text-error hover:bg-error/10 transition-all"
                                                title="Delete">
                                                <i data-lucide="trash-2" class="w-3 h-3"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($users->hasPages())
            <div class="p-4 border-t border-white/5 flex justify-center bg-base-200/20">
                {{ $users->links() }}
            </div>
        @endif
    </div>
@endsection

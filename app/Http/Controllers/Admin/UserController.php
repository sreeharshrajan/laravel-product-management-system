<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Enums\UserRole;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(): View
    {
        Gate::authorize('viewAny', User::class);
        $users = $this->userRepository->getAll();
        return view('admin.users.index', compact('users'));
    }

    public function create(): View
    {
        Gate::authorize('create', User::class);
        return view('admin.users.create');
    }

    public function store(UserStoreRequest $request): RedirectResponse
    {
        Gate::authorize('create', User::class);
        
        $this->userRepository->create($request->validated());

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function show(string $id): View
    {
        $user = $this->userRepository->findById($id);

        if (!$user) {
            abort(404);
        }

        Gate::authorize('view', $user);

        return view('admin.users.show', compact('user'));
    }

    public function edit(string $id): View
    {
        $user = $this->userRepository->findById($id);

        if (!$user) {
            abort(404);
        }

        Gate::authorize('update', $user);

        return view('admin.users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, string $id): RedirectResponse
    {
        $user = $this->userRepository->findById($id);

        if (!$user) {
            abort(404);
        }

        Gate::authorize('update', $user);

        $validated = $request->validated();
        
        // Filter out null password so it doesn't overwrite with null/empty
        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        $this->userRepository->update($user, $validated);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $user = $this->userRepository->findById($id);

        if (!$user) {
            abort(404);
        }

        Gate::authorize('delete', $user);

        $this->userRepository->delete($user);

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}

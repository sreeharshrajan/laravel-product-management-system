<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body
    class="bg-base-300 min-h-screen flex items-center justify-center font-['Instrument_Sans'] relative overflow-hidden">
    <!-- Background Decoration -->
    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-primary/10 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-secondary/10 rounded-full blur-[120px]">
        </div>
    </div>

    <div class="card w-full max-w-2xl bg-base-100/80 backdrop-blur-xl shadow-2xl z-10 border border-white/10">
        <div class="card-body">
            <div class="text-center mb-6">
                <h2 class="text-3xl font-bold ">
                    Create Account</h2>
                <p class="text-base-content/60 mt-2">Join us to manage your products</p>
            </div>

            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Name</span>
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}" required autofocus
                            placeholder="John Doe"
                            class="input input-bordered w-full bg-base-200/50 focus:bg-base-100 transition-colors @error('name') input-error @enderror" />
                        @error('name')
                            <span class="text-error text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Email</span>
                        </label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            placeholder="email@example.com"
                            class="input input-bordered w-full bg-base-200/50 focus:bg-base-100 transition-colors @error('email') input-error @enderror" />
                        @error('email')
                            <span class="text-error text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Password</span>
                        </label>
                        <input type="password" name="password" required placeholder="••••••••"
                            class="input input-bordered w-full bg-base-200/50 focus:bg-base-100 transition-colors @error('password') input-error @enderror" />
                        @error('password')
                            <span class="text-error text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">Confirm Password</span>
                        </label>
                        <input type="password" name="password_confirmation" required placeholder="••••••••"
                            class="input input-bordered w-full bg-base-200/50 focus:bg-base-100 transition-colors" />
                    </div>
                </div>

                <div class="form-control mt-6">
                    <button type="submit"
                        class="btn btn-primary btn-block shadow-lg shadow-primary/30 bg-gradient-to-r from-accent to-primary border-none hover:shadow-xl transition-all">Sign
                        Up</button>
                </div>
            </form>

            <div class="divider text-xs opacity-50">OR</div>

            <div class="text-center text-sm">
                Already have an account? <a href="{{ route('login') }}"
                    class="link link-primary font-medium text-secondary">Log in</a>
            </div>
        </div>
    </div>
</body>

</html>

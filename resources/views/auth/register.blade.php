<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        }

        .register-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
            padding: 2rem 2rem 1.5rem 2rem;
            border-top: 6px solid #d90429;
        }

        .register-btn {
            background: #d90429;
            color: #fff;
            font-weight: 600;
            border-radius: 0.5rem;
            padding: 0.75rem 2rem;
            transition: background 0.2s;
        }

        .register-btn:hover {
            background: #b80323;
        }
    </style>
</head>

<body class="flex justify-center items-center min-h-screen p-4">
    <main class="w-full max-w-sm">
        <div class="register-card">
            <h1 class="text-center text-black text-xl font-semibold mb-8">CREATE AN ACCOUNT</h1>
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="name" class="block text-black text-sm mb-1">{{ __('Name') }}</label>
                    <input id="name" type="text" name="name" placeholder="Name"
                        class="w-full border border-gray-300 text-gray-700 text-sm px-3 py-2 rounded focus:outline-none focus:ring-1 focus:ring-[#d90429]"
                        value="{{ old('name') }}" required autofocus autocomplete="name" />
                </div>

                <div>
                    <label for="email" class="block text-black text-sm mb-1">{{ __('Email') }}</label>
                    <input id="email" type="email" name="email" placeholder="Email"
                        class="w-full border border-gray-300 text-gray-700 text-sm px-3 py-2 rounded focus:outline-none focus:ring-1 focus:ring-[#d90429]"
                        value="{{ old('email') }}" required autocomplete="username" />
                </div>

                <div>
                    <label for="phone" class="block text-black text-sm mb-1">{{ __('Phone') }}</label>
                    <input id="phone" type="number" name="phone" placeholder="Phone"
                        class="w-full border border-gray-300 text-gray-700 text-sm px-3 py-2 rounded focus:outline-none focus:ring-1 focus:ring-[#d90429]"
                        value="{{ old('phone') }}" required />
                </div>

                <div>
                    <label for="address" class="block text-black text-sm mb-1">{{ __('Address') }}</label>
                    <input id="address" type="text" name="address" placeholder="Address"
                        class="w-full border border-gray-300 text-gray-700 text-sm px-3 py-2 rounded focus:outline-none focus:ring-1 focus:ring-[#d90429]"
                        value="{{ old('address') }}" required />
                </div>

                <div>
                    <label for="password" class="block text-black text-sm mb-1">{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" placeholder="Password"
                        class="w-full border border-gray-300 text-gray-700 text-sm px-3 py-2 rounded focus:outline-none focus:ring-1 focus:ring-[#d90429]"
                        required autocomplete="new-password" />
                </div>

                <div>
                    <label for="password_confirmation"
                        class="block text-black text-sm mb-1">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        placeholder="Confirm Password"
                        class="w-full border border-gray-300 text-gray-700 text-sm px-3 py-2 rounded focus:outline-none focus:ring-1 focus:ring-[#d90429]"
                        required autocomplete="new-password" />
                </div>

                <div class="flex items-center justify-center mt-6">
                    <button type="submit" class="register-btn w-full">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>

            <hr class="border-gray-300 my-6" />
            <p class="text-center text-xs text-black mt-6">
                Already have an account?
                <span class="font-semibold cursor-pointer">
                    <a href="{{ route('login') }}"
                        class="underline text-sm text-gray-600 hover:text-gray-900">{{ __('Log in here') }}</a>
                </span>
            </p>
        </div>
    </main>
</body>

</html>

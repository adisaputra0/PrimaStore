<x-auth>
    <section class="bg-gray-50 dark:bg-gray-950 min-h-screen flex items-center justify-center">
        <div class="bg-gray-100 dark:bg-gray-800 flex rounded shadow-lg max-w-3xl p-5 items-center" data-aos="fade" data-aos-duration="700">
            <!-- Left - Form -->
            <div class="md:w-1/2 px-10">
                <h2 class="font-bold text-2xl text-[#002074] dark:text-white">Register</h2>
                <p class="text-sm mt-4 dark:text-white">Silahkan isi data diri lengkap</p>

                <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-4">
                    @csrf
                    @method("POST")
                    {{-- NAME --}}
                    <div>
                        <input class="p-2 mt-8 rounded border bg-white w-full @error('name') border-red-500 @enderror" 
                               type="text" 
                               name="name" 
                               placeholder="Name" 
                               value="{{ old('name') }}" 
                               required 
                               autofocus>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- EMAIL --}}
                    <div>
                        <input class="p-2 rounded border bg-white w-full @error('email') border-red-500 @enderror" 
                               type="text" 
                               name="email" 
                               placeholder="Email" 
                               value="{{ old('email') }}" 
                               required>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- PASSWORD --}}
                    <div class="relative">
                        <input class="p-2 rounded border bg-white w-full @error('password') border-red-500 @enderror" 
                               type="password" 
                               name="password" 
                               placeholder="Password" 
                               id="password" 
                               required>
                        <svg onclick="showPassword('password')" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="cursor-pointer bi bi-eye absolute top-1/2 right-3 -translate-y-1/2" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                        </svg>
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- PASSWORD CONFIRMATION --}}
                    <div class="relative">
                        <input class="p-2 rounded border bg-white w-full @error('password_confirmation') border-red-500 @enderror" 
                               type="password" 
                               name="password_confirmation" 
                               placeholder="Konfirmasi Password" 
                               id="password_confirmation"
                               required>
                            <svg onclick="showPassword('password_confirmation')" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="cursor-pointer bi bi-eye absolute top-1/2 right-3 -translate-y-1/2" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                            </svg>
                        @error('password_confirmation')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- FLASH ERROR --}}
                    @if (session('error'))
                        <p class="text-red-500 text-sm">{{ session('error') }}</p>
                    @endif

                    <button class="bg-[#002074] dark:bg-blue-800 rounded text-white py-2 hover:scale-105 duration-300 cursor-pointer" type="submit">
                        Register
                    </button>
                </form>

                <div class="mt-5 text-xs flex border-t border-gray-400 py-3 justify-between items-center">
                    <p class="dark:text-white">Sudah punya akun?</p>
                    <a href="{{ route('login') }}" class="py-2 px-5 bg-white border border-gray-300 rounded hover:scale-110 duration-300">Login</a>
                </div>
            </div>

            <!-- Right - Image -->
            <div class="md:block hidden w-1/2">
                <img class="rounded-2xl" src="{{ asset('images/register.png') }}" alt="">
            </div>
        </div>
    </section>
</x-auth>

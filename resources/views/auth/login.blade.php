<x-auth>
    
    <section class="bg-gray-50 dark:bg-gray-950 min-h-screen flex items-center justify-center">
        <!-- Login Container -->
        <div class="bg-gray-100 dark:bg-gray-800 flex rounded shadow-lg max-w-3xl p-5 items-center" data-aos="fade" data-aos-duration="700">
            <!-- Left - Form -->
            <div class="md:w-1/2 px-10">
                <h2 class="font-bold text-2xl text-[#002074] dark:text-white">Login</h2>
                <p class="text-sm mt-4 dark:text-white">Silahkan masukkan email dan password</p>

                <form method="POST" action="{{ route('post.login') }}" class="flex flex-col gap-4">
                @csrf
                @method("POST")
                {{-- EMAIL --}}
                <div>
                    <input class="p-2 mt-8 rounded border border-gray-300 bg-white w-full @error('email') border-red-500 @enderror" 
                        type="text" 
                        name="email" 
                        placeholder="Email" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div class="relative">
                    <input class="p-2 rounded border border-gray-300 bg-white w-full @error('password') border-red-500 @enderror" 
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

                {{-- FLASH ERROR (contoh: email belum diverifikasi, email/password salah) --}}
                @if (session('error'))
                    <p class="text-red-500 text-sm">{{ session('error') }}</p>
                @endif

                <button class="bg-[#002074] dark:bg-blue-800 rounded text-white py-2 hover:scale-105 duration-300 cursor-pointer" type="submit">Login</button>
            </form>


                <!-- Devider -->
                {{-- <div class="mt-10 grid grid-cols-3 items-center text-gray-500">
                    <hr class="border-gray-500">
                    <p class="text-center text-sm">OR</p>
                    <hr class="border-gray-500">
                </div>

                <button class="bg-white border border-gray-300 py-2 w-full text-sm rounded-xl mt-5 flex items-center justify-center hover:scale-105 duration-300">
                    <svg viewBox="0 0 48 48" width="20px" height="20px" class="mr-3">
                        <clipPath id="g">
                          <path d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"/>
                        </clipPath>
                        <g class="colors" clip-path="url(#g)">
                          <path fill="#FBBC05" d="M0 37V11l17 13z"/>
                          <path fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z"/>
                          <path fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z"/>
                          <path fill="#4285F4" d="M48 48L17 24l-4-3 35-10z"/>
                        </g>
                      </svg>
                    Login with Google
                </button> --}}

                {{-- <p class="mt-5 text-xs border-b border-gray-400 py-6 dark:text-white">Lupa password?</p> --}}

                <div class="mt-3 text-xs flex border-t border-gray-400 py-3 justify-between items-center">
                    <p class="dark:text-white">Belum punya akun?</p>
                    <a href="{{ route('register') }}" class="py-2 px-5 bg-white border border-gray-300 rounded hover:scale-110 duration-300">Register</a>
                </div>

            </div>

            <!-- Right - Image -->
            <div class="md:block hidden w-1/2">
                <img class="rounded-2xl" src="{{ asset('images/login.png') }}" alt="">
            </div>
        </div>
        <!-- Login Container -->
    </section>
</x-auth>
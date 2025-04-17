<!-- resources/views/auth/verify-email.blade.php -->

<!DOCTYPE html>
 <html lang="en">
<head>
    <link rel="canonical" href="https://https://demo.themesberg.com/PrimaStore/" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>

    <!-- Favicon -->
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <div class="bg-white dark:bg-gray-800 w-full h-[100vh] flex justify-center items-center">
        <div class="w-1/2">
            <div class="text-center w-full mx-auto lg:px-8 z-20">
                <h2 class="text-3xl font-extrabold text-black dark:text-white sm:text-4xl">
                    <span class="block">
                        Verifikasi Email
                    </span>
                </h2>
                <p class="text-xl mt-4 mx-auto text-gray-400">
                    Silakan cek email kamu dan klik link verifikasi untuk melanjutkan.
                    Jika kamu tidak menerima email, klik tombol di bawah untuk mengirim ulang.
                </p>
                @if (session('message'))
                    <p>{{ session('message') }}</p>
                @endif
            
                <div class="lg:mt-0 lg:flex-shrink-0">
                    <div class="mt-6 inline-flex rounded-md shadow">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="py-4 px-6  bg-blue-800 hover:bg-blue-900 focus:ring-blue-950 focus:ring-offset-blue-950 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">Kirim Ulang Email Verifikasi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
        if (localStorage.getItem('color-theme')) {
            if (localStorage.getItem('color-theme') === 'light') {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        }
    </script>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
    <title>Verifikasi Email</title>
</head>
<body>
    <h1>Verifikasi Email</h1>
    <p>
    </p>

</body>
</html>

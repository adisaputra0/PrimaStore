<x-admin>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div class="flex items-center justify-center h-24 rounded-sm bg-gray-50 dark:bg-gray-800 py-[80px]">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
                <h1 class="whitespace-nowrap dark:text-white text-center flex flex-col gap-5">
                    <span class="text-5xl font-bold"><i class="fa-solid fa-users"></i> 200</span>
                    <span class="text-2xl">Total Pengguna</span>
                </h1>
            </p>
        </div>
        <div class="flex items-center justify-center h-24 rounded-sm bg-gray-50 dark:bg-gray-800 py-[80px]">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
                <h1 class="whitespace-nowrap dark:text-white text-center flex flex-col gap-5">
                    <span class="text-5xl font-bold"><i class="fa-solid fa-store"></i> 50+</span>
                    <span class="text-2xl">Total Produk</span>
                </h1>
            </p>
        </div>
        <div class="flex items-center justify-center h-24 rounded-sm bg-gray-50 dark:bg-gray-800 py-[80px]">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
                <h1 class="whitespace-nowrap dark:text-white text-center flex flex-col gap-5">
                    <span class="text-5xl font-bold"><i class="fa-solid fa-cart-shopping"></i> 10k</span>
                    <span class="text-2xl">Total Transaksi</span>
                </h1>
            </p>
        </div>
        <div class="flex items-center justify-center h-24 rounded-sm bg-gray-50 dark:bg-gray-800 py-[80px]">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
                <h1 class="whitespace-nowrap dark:text-white text-center flex flex-col gap-5">
                    <span class="text-5xl font-bold"><i class="fa-solid fa-coins"></i> 100k</span>
                    <span class="text-2xl">Total Koin</span>
                </h1>
            </p>
        </div>
    </div>
    <div class="flex flex-col items-center justify-center p-5 py-20 md:p-20 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800 dark:text-white">
        <h1 class="whitespace-nowrap dark:text-white text-center flex flex-col gap-5 mb-10 w-100">
            <span class="text-3xl font-bold w-max mx-auto">TABEL USERS</span>
        </h1>
        <table id="myTable" class="display w-100 overflow-auto">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Budi Santoso</td>
                    <td>budi@example.com</td>
                    <td>Jakarta</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Citra Dewi</td>
                    <td>citra@example.com</td>
                    <td>Surabaya</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Budi Santoso</td>
                    <td>budi@example.com</td>
                    <td>Jakarta</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Citra Dewi</td>
                    <td>citra@example.com</td>
                    <td>Surabaya</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Budi Santoso</td>
                    <td>budi@example.com</td>
                    <td>Jakarta</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Citra Dewi</td>
                    <td>citra@example.com</td>
                    <td>Surabaya</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Budi Santoso</td>
                    <td>budi@example.com</td>
                    <td>Jakarta</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Citra Dewi</td>
                    <td>citra@example.com</td>
                    <td>Surabaya</td>
                </tr>
            </tbody>
        </table>       
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div class="flex items-center justify-center rounded-sm bg-gray-50 h-[50vh] px-5 py-10 dark:bg-gray-800">
            <canvas id="transaksiChart" style="width: 100%; height: 100%;"></canvas>
        </div>
        <div class="flex items-center justify-center rounded-sm bg-gray-50 h-[50vh] px-5 py-10 dark:bg-gray-800">
            <canvas id="penggunaChart" style="width: 100%; height: 100%;"></canvas>
        </div>
        {{-- <div class="flex items-center justify-center rounded-sm bg-gray-50 h-28 dark:bg-gray-800">
        <p class="text-2xl text-gray-400 dark:text-gray-500">
            <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
        </p>
        </div>
        <div class="flex items-center justify-center rounded-sm bg-gray-50 h-28 dark:bg-gray-800">
        <p class="text-2xl text-gray-400 dark:text-gray-500">
            <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
        </p>
        </div> --}}
    </div>
    {{-- <div class="flex items-center justify-center h-48 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">
        <p class="text-2xl text-gray-400 dark:text-gray-500">
        <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
        </svg>
        </p>
    </div>
    <div class="grid grid-cols-2 gap-4">
        <div class="flex items-center justify-center rounded-sm bg-gray-50 h-28 dark:bg-gray-800">
        <p class="text-2xl text-gray-400 dark:text-gray-500">
            <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
        </p>
        </div>
        <div class="flex items-center justify-center rounded-sm bg-gray-50 h-28 dark:bg-gray-800">
        <p class="text-2xl text-gray-400 dark:text-gray-500">
            <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
        </p>
        </div>
        <div class="flex items-center justify-center rounded-sm bg-gray-50 h-28 dark:bg-gray-800">
        <p class="text-2xl text-gray-400 dark:text-gray-500">
            <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
        </p>
        </div>
        <div class="flex items-center justify-center rounded-sm bg-gray-50 h-28 dark:bg-gray-800">
        <p class="text-2xl text-gray-400 dark:text-gray-500">
            <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
        </p>
        </div>
    </div> --}}
</x-admin>
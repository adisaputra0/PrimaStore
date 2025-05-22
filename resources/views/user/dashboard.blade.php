<x-user>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        @if(auth()->user()->role == 'admin')
            <div class="flex items-center justify-center h-24 rounded-sm bg-gray-50 dark:bg-gray-800 py-[80px]">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <h1 class="whitespace-nowrap dark:text-white text-center flex flex-col gap-5">
                        <span class="text-5xl font-bold"><i class="fa-solid fa-users"></i> {{ $total['total_users'] }}</span>
                        <span class="text-2xl">Total Pengguna</span>
                    </h1>
                </p>
            </div>
        @endif
        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'penjual')
            <div class="flex items-center justify-center h-24 rounded-sm bg-gray-50 dark:bg-gray-800 py-[80px]">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <h1 class="whitespace-nowrap dark:text-white text-center flex flex-col gap-5">
                        <span class="text-5xl font-bold"><i class="fa-solid fa-store"></i> {{ $total['total_products'] }}</span>
                        <span class="text-2xl">Total Produk</span>
                    </h1>
                </p>
            </div>
        @endif
        <div class="flex items-center justify-center h-24 rounded-sm bg-gray-50 dark:bg-gray-800 py-[80px]">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
                <h1 class="whitespace-nowrap dark:text-white text-center flex flex-col gap-5">
                    <span class="text-5xl font-bold"><i class="fa-solid fa-cart-shopping"></i> {{ $total['total_transactions'] }}</span>
                    <span class="text-2xl">Total Transaksi</span>
                </h1>
            </p>
        </div>
        <div class="flex items-center justify-center h-24 rounded-sm bg-gray-50 dark:bg-gray-800 py-[80px]">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
                <h1 class="whitespace-nowrap dark:text-white text-center flex flex-col gap-5">
                    <span class="text-5xl font-bold"><i class="fa-solid fa-coins"></i> {{ $total['total_coins'] }}</span>
                    <span class="text-2xl">Total Koin</span>
                </h1>
            </p>
        </div>
    </div>
    <div class="flex flex-col items-center justify-center p-5 py-20 md:p-20 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800 dark:text-white">
        <h1 class="whitespace-nowrap dark:text-white text-center flex flex-col gap-5 mb-10 w-100">
            <span class="text-3xl font-bold w-max mx-auto">TABEL PRODUCTS</span>
        </h1>
        <div id="container-table">
            <table id="myTable" class="display w-100 overflow-auto">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>File</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->file }}</td>
                            <td>
                                @if($product->picture)
                                    {!! '<img src="' . asset('images/products/' . $product->picture) . '" alt="Product Picture" width="100px" class="rounded">' !!}
                                @else
                                    {!! '<img src="' . asset('images/product.png') . '" alt="Product Picture" width="100px" class="rounded">' !!}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>       
        </div>
    </div>
    
    @if(auth()->user()->role == 'admin')
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
    @endif
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

    <!-- jQuery (dibutuhkan oleh DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function () {
            // Pastikan elemen #transaksiChart ada sebelum membuat grafik transaksi
            let ctxTransaksi = document.getElementById('transaksiChart');
            if (ctxTransaksi) {
                const transaksiChart = new Chart(ctxTransaksi.getContext('2d'), {
                    type: 'bar',
                    data: {
                    labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'],
                    datasets: [{
                        label: 'Jumlah Transaksi',
                        data: [120, 190, 300, 500, 220, 330],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                    },
                    options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                    }
                });
            }

            // Pastikan elemen #penggunaChart ada sebelum membuat grafik pengguna
            let ctxPengguna = document.getElementById('penggunaChart');
            if (ctxPengguna) {
                const penggunaChart = new Chart(ctxPengguna.getContext('2d'), {
                    type: 'pie',
                    data: {
                    labels: ['Pembeli', 'Penjual'],
                    datasets: [{
                        label: 'Jumlah Pengguna',
                        data: [{{ $total['total_pembeli'] }}, {{ $total['total_penjual'] }}],
                        backgroundColor: ['rgba(54, 162, 235, 0.7)', 'rgba(255, 99, 132, 0.7)'],
                        borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)'],
                        borderWidth: 1
                    }]
                    },
                    options: {
                    responsive: true
                    }
                });
            }
        });
    </script>
</x-user>
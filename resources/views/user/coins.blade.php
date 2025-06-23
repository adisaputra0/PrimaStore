<x-user>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('CLIENT_KEY') }}"></script>

    <div class="flex flex-col items-center md:items-start md:justify-start p-5 py-20 md:p-20 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800 dark:text-white">
        
        <h1 class="dark:text-white font-bold text-5xl mb-10">PERSONAL DATA</h1>
        <div class="grid gap-4 mb-4 grid-cols-2 w-full">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type name" required="" value="{{ auth()->user()->name }}" disabled>
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type email" required="" value="{{ auth()->user()->email }}" disabled>
            </div>
            <div>
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type phone" value="{{ auth()->user()->phone? auth()->user()->phone:'-' }}" disabled>
            </div>
            {{-- <div>
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                <input type="file" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            </div> --}}
            <div>
                <label for="bio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bio</label>
                <input type="text" name="bio" id="bio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type bio" value="{{ auth()->user()->bio }}" disabled>
            </div>
            {{-- <div>
                <label for="ktm" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">KTM</label>
                <input type="file" name="ktm" id="ktm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
            </div> --}}
            <div>
                <label for="is_verified" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Is Verified</label>
                <select id="is_verified" name="is_verified" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" disabled>
                    <option value="1" {{ auth()->user()->is_verified? 'selected':'' }}>Verified</option>
                    <option value="0" {{ !auth()->user()->is_verified? 'selected':'' }}>Not Verified</option>
                </select>
            </div>
            <div>
                <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" disabled>
                    <option value="admin" {{ auth()->user()->role == 'admin'? 'selected':'' }}>Admin</option>
                    <option value="penjual" {{ auth()->user()->role == 'penjual'? 'selected':'' }}>Penjual</option>
                    <option value="pembeli" {{ auth()->user()->role == 'pembeli'? 'selected':'' }}>Pembeli</option>
                </select>
            </div>
        </div>
    </div>

    <div class="flex flex-col items-center md:items-start md:justify-start p-5 py-20 md:p-20 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800 dark:text-white">
        
        <h1 class="dark:text-white font-bold text-5xl mb-7">COINS</h1>
        <div class="w-full">
            <input type="text" id="name" value="{{ auth()->user()->name }}" readonly class="mt-1 p-2 w-full border rounded hidden">
            <input type="text" id="email" value="{{ auth()->user()->email }}" readonly class="mt-1 p-2 w-full border rounded hidden">
            <input type="text" id="phone" name="phone" value="{{ auth()->user()->phone }}" class="mt-1 p-2 w-full border rounded hidden">

            <div class="mb-4 w-full">
                {{-- <label for="items" class="block text-sm font-medium">Paket:</label> --}}
                <div class="space-y-2">
                    <label class="block p-3 border rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="flex items-center">
                            <input type="radio" name="items" value='{"id":"ITEM-1","price":20000,"quantity":1,"name":"Paket_1","subtotal":20000}' class="form-radio text-blue-600" checked>
                            <span class="ml-3 text-black dark:text-white font-semibold">Paket Murah - 20PK | Rp20.000</span>
                        </div>
                        <p class="ml-7 text-sm text-gray-600 dark:text-gray-300">Mulai dari sini! Paket hemat untuk kamu yang ingin coba-coba dulu isi koin.</p>
                    </label>

                    <label class="block p-3 border rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="flex items-center">
                            <input type="radio" name="items" value='{"id":"ITEM-2","price":50000,"quantity":1,"name":"Paket_2","subtotal":50000}' class="form-radio text-blue-600">
                            <span class="ml-3 text-black dark:text-white font-semibold">Paket Sedang - 50PK | Rp50.000</span>
                        </div>
                        <p class="ml-7 text-sm text-gray-600 dark:text-gray-300">Top up sedang yang pas untuk pengguna aktif, cocok buat kebutuhan harianmu.</p>
                    </label>

                    <label class="block p-3 border rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="flex items-center">
                            <input type="radio" name="items" value='{"id":"ITEM-3","price":100000,"quantity":1,"name":"Paket_3","subtotal":100000}' class="form-radio text-blue-600">
                            <span class="ml-3 text-black dark:text-white font-semibold">Paket Mahal - 100PK | Rp100.000</span>
                        </div>
                        <p class="ml-7 text-sm text-gray-600 dark:text-gray-300">Dapatkan lebih banyak koin dan nikmati transaksi tanpa khawatir kehabisan.</p>
                    </label>

                    <label class="block p-3 border rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="flex items-center">
                            <input type="radio" name="items" value='{"id":"ITEM-4","price":1000000,"quantity":1,"name":"Paket_4","subtotal":1000000}' class="form-radio text-blue-600">
                            <span class="ml-3 text-black dark:text-white font-semibold">Paket Sultan - 1.000PK | Rp1.000.000</span>
                        </div>
                        <p class="ml-7 text-sm text-gray-600 dark:text-gray-300">Pilihan terbaik untuk kamu yang serius! Langsung isi banyak dan bebas pakai kapan saja.</p>
                    </label>
                </div>
            </div>

            <button id="payButton" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Bayar</button>
        </div>
        
    </div>
    
    <script>
        document.getElementById('payButton').addEventListener('click', function() {
            const selectedRadio = document.querySelector('input[name="items"]:checked');
            const items = [JSON.parse(selectedRadio.value)];
            // const items = [JSON.parse(document.getElementById('items').value)];
            const phone = document.getElementById('phone').value;

            fetch('/get-snap-token', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({ items: items, phone: phone })
            })
            .then(response => response.json())
            .then(data => {
                if (data.snap_token) {
                    window.snap.pay(data.snap_token, {
                        onSuccess: function(result) {
                            fetch('/payment_post', { // Kirim ke backend
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                body: JSON.stringify(result)
                            })
                            .then(res => res.json())
                            .then(response => {
                                alert(response.success || response.error);
                                console.log("testttttttttttt");
                            });
                        },
                        onPending: function(result) {
                            console.log('Pending:', result);
                                console.log("pending");
                        },
                        onError: function(result) {
                            console.log('Error:', result);
                        }
                    });
                } else {
                    alert('Gagal mendapatkan token pembayaran.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
        </script>

</x-admin>
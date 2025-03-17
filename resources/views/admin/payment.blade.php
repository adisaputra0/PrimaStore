<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('CLIENT_KEY') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-xl font-bold mb-4">Pembayaran</h2>

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama:</label>
            <input type="text" id="name" value="{{ auth()->user()->name }}" readonly class="mt-1 p-2 w-full border rounded">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
            <input type="text" id="email" value="{{ auth()->user()->email }}" readonly class="mt-1 p-2 w-full border rounded">
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon:</label>
            <input type="text" id="phone" name="phone" value="08123456789" class="mt-1 p-2 w-full border rounded">
        </div>

        <div class="mb-4">
            <label for="items" class="block text-sm font-medium text-gray-700">Barang:</label>
            <select id="items" class="mt-1 p-2 w-full border rounded">
                <option value='{"id":"ITEM-1","price":5000,"quantity":1,"name":"Apple","subtotal":5000}'>Apple - Rp5.000</option>
                <option value='{"id":"ITEM-2","price":7000,"quantity":2,"name":"Jeruk","subtotal":14000}'>Jeruk - Rp7.000</option>
            </select>
        </div>

        <button id="payButton" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Bayar</button>
    </div>

    <script>
    document.getElementById('payButton').addEventListener('click', function() {
        const items = [JSON.parse(document.getElementById('items').value)];
        const phone = document.getElementById('phone').value;

        fetch('/get-snap-token', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({ items: items, phone: phone })
        })
        .then(response => response.json())
        .then(data => {
            if (data.snap_token) {
                window.snap.pay(data.snap_token);
            } else {
                alert('Gagal mendapatkan token pembayaran.');
            }
        })
        .catch(error => console.error('Error:', error));
    });
    </script>
</body>
</html>

<x-user>
    <style>
        #myTable_wrapper{
            width: 1200px;
        }
    </style>
    <div class="dark:text-white">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <strong>Oops!</strong> Ada kesalahan:<br><br>
                <ul class="list-disc pl-5 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Add modal -->
        <div id="crud-modal" data-modal-placement="center" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[100%] max-h-full bg-[rgba(0,0,0,0.5)]">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Create New Product
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form method="POST" action="{{ route('store-product') }}" enctype="multipart/form-data" class="p-4 md:p-5 mb-5">
                        @csrf
                        @method("POST")
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <input type="text" name="user_id" id="user_id" hidden placeholder="Type name" value="{{ auth()->user()->id }}">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type name" required="">
                            </div>
                            <div>
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <input type="text" name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type description" required="">
                            </div>
                            <div>
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price (PK)</label>
                                <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type price" required="">
                            </div>
                            <div>
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="Website">Website</option>
                                    <option value="Buku">Buku</option>
                                </select>
                            </div>
                            <div>
                                <label for="file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File</label>
                                <input type="file" name="file" id="file" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            <div>
                                <label for="picture" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Picture</label>
                                <input type="file" name="picture" id="picture" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            <div class="col-span-2">
                                <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link</label>
                                <input type="text" name="link" id="link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type link">
                            </div>
                        </div>
                        <button type="submit" class="w-[100%] mx-auto text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            Add Product
                        </button>
                    </form>
                </div>
            </div>
        </div>           
        <!-- Edit modal -->
        <div id="edit" data-modal-placement="center" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[100%] max-h-full bg-[rgba(0,0,0,0.5)]">
            <div class="relative w-full max-w-md max-h-full p-4">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Edit Product
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <div id="modal-body-edit">

                    </div>
                </div>
            </div>
        </div>   
        {{-- Trash --}}
        <div id="trash" tabindex="-1" class="h-full bg-[rgba(0,0,0,0.5)] hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="trash">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <div id="modal-body-destroy">
                        </div>
                        {{-- <button data-modal-hide="trash" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button> --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- Details --}}
        <div id="details" data-modal-placement="center" tabindex="-1" class="bg-[rgba(0,0,0,0.5)] h-full fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            Detail Product
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="details">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div id="modal-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(auth()->user()->role == "admin" || auth()->user()->role == "penjual")
        <div class="flex flex-col items-center md:items-start md:justify-start p-5 py-20 md:p-20 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800 dark:text-white">
            <div class="flex justify-between items-center w-[100%] mb-10">
                <h1 class="dark:text-white font-bold text-5xl">PURCHASED </h1>
                <!-- Modal toggle -->
                @if(auth()->user()->role == "penjual")
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-white px-4 py-2 font-semibold bg-green-500 rounded hover:bg-green-700 cursor-pointer" type="button">
                        + Add Product
                    </button>
                @endif
            </div>
            <div id="container-table">
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>No</th>
                            @if(auth()->user()->role == "admin")
                                <th>User</th>
                            @endif
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Category</th>
                            {{-- <th>File</th> --}}
                            <th>Pictures</th>
                            <th>Link (Preview)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                @if(auth()->user()->role == "admin")
                                    <td>{{ $product->user->name }}</td>
                                @endif
                                <td>{{ $product->name }}</td>
                                <td>{{ Str::limit($product->description, 10) }}</td>
                                <td>{{ $product->price }}PK</td>
                                <td>{{ $product->category }}</td>
                                {{-- <td>{{ $product->file }}</td> --}}
                                <td>
                                    @if($product->picture)
                                        {!! '<img src="' . asset('images/products/' . $product->picture) . '" alt="Image Product" width="100px" class="rounded">' !!}
                                    @else
                                        {!! '<img src="' . asset('images/product.png') . '" alt="Image Product" width="100px" class="rounded">' !!}
                                    @endif
                                </td>
                                <td>{{ Str::limit($product->link, 30) }}</td>
                                <td>
                                    <div class="flex items-center justify-center gap-3">
                                        <button id="btn-destroy" data-modal-target="trash" data-modal-toggle="trash" data-id="{{ $product->id }}" class="text-white px-4 py-2 font-semibold bg-red-500 rounded hover:bg-red-700 cursor-pointer" type="button">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <button id="btn-edit" data-modal-target="edit" data-modal-toggle="edit" data-id="{{ $product->id }}" class="text-white px-4 py-2 font-semibold bg-orange-500 rounded hover:bg-orange-700 cursor-pointer">
                                            <i class="fa-solid fa-pen"></i>
                                        </button>
                                        <button id="btn-detail" data-modal-target="details" data-modal-toggle="details" data-id="{{ $product->id }}" class="text-white px-4 py-2 font-semibold bg-blue-500 rounded hover:bg-blue-700 cursor-pointer" type="button">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>       
            </div>
        </div>
    @else
        <div class="flex flex-col items-center md:items-start md:justify-start p-5 py-20 md:p-20 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800 dark:text-white">
            <div class="flex justify-between items-center w-[100%] mb-10">
                <h1 class="dark:text-white font-bold text-5xl">PURCHASED</h1>
            </div>
            <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8 w-full">
                @foreach ($products as $product)
                    <div class="bg-white dark:bg-gray-700 p-5 shadow-lg rounded-2xl overflow-hidden transition-transform hover:scale-[1.01]">
                        <img src="{{ asset('images/products/' . $product->picture) }}" 
                            alt="{{ $product->name }}" 
                            class="w-full h-60 object-cover">

                        <div class="p-5 space-y-2">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-700 dark:text-white">{{ $product->name }}</h3>
                                <span class="text-indigo-600 dark:text-indigo-400 font-bold text-sm"><i class="fa-solid fa-coins"></i> {{ $product->price }}PK</span>
                            </div>

                            {{-- RATING --}}
                            @php
                                $average = $product->reviews->avg('rating') ?? 0;
                                $totalReviews = $product->reviews->count();
                                $fullStars = floor($average);
                                $halfStar = ($average - $fullStars) >= 0.5;
                                $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                            @endphp
                            <div class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                {{-- Full Stars --}}
                                @for ($i = 0; $i < $fullStars; $i++)
                                    <i class="fa-solid fa-star text-yellow-400"></i>
                                @endfor
                                {{-- Half Star --}}
                                @if ($halfStar)
                                    <i class="fa-solid fa-star-half-stroke text-yellow-400"></i>
                                @endif
                                {{-- Empty Stars --}}
                                @for ($i = 0; $i < $emptyStars; $i++)
                                    <i class="fa-regular fa-star text-gray-400 dark:text-gray-600"></i>
                                @endfor
                                <span class="ml-2">({{ number_format($average, 1) }}) - {{ $totalReviews }} reviews</span>
                            </div>

                            {{-- DESKRIPSI --}}
                            <p class="text-sm text-gray-500 dark:text-gray-400 line-clamp-2">
                                {{ Str::limit($product->description, 100) }}
                            </p>

                            {{-- NAMA PEMBUAT --}}
                            <p class="text-xs text-gray-400 dark:text-gray-500 mt-2">By {{ $product->user->name ?? 'Unknown' }}</p>

                            {{-- TOMBOL LIHAT DETAIL --}}
                            <a href="#" id="btn-detail" data-modal-target="details" data-modal-toggle="details" data-id="{{ $product->id }}"
                                class="mt-3 inline-block text-indigo-600 dark:text-indigo-400 font-medium text-sm hover:underline">
                                View Details →
                            </a>
                        </div>
                    </div>
                @endforeach
            </section>


        </div>
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).on('click', '#btn-detail', function() {
            let id = $(this).data('id');
            let url = "{{ route('detail-product', ['id' => '__id__']) }}".replace('__id__', id);
            // Panggil server via AJAX
            $.ajax({
                url: url, // sesuaikan dengan route kamu
                method: 'GET',
                success: function(response) {
                    $('#modal-body').html(response); // Masukkan ke modal
                    // $('#myModal').show();
                    
                    let stars = document.querySelectorAll('#starRating .star');
                    let ratingInput = document.getElementById('rating');

                    stars.forEach((star, index) => {
                        star.addEventListener('click', () => {
                            let rating = index + 1;
                            ratingInput.value = rating;

                            // Update warna bintang
                            stars.forEach((s, i) => {
                                s.classList.toggle('text-yellow-400', i < rating);
                                s.classList.toggle('text-gray-500', i >= rating);
                            });
                        });
                    });
                },
                error: function(err) {
                    alert('Gagal mengambil data!');
                    console.log(err);
                }
            });
        });
        
        $(document).on('click', '#btn-edit', function() {
            let id = $(this).data('id');
            let url = "{{ route('edit-product', ['id' => '__id__']) }}".replace('__id__', id);
            // Panggil server via AJAX
            $.ajax({
                url: url, // sesuaikan dengan route kamu
                method: 'GET',
                success: function(response) {
                    $('#modal-body-edit').html(response); // Masukkan ke modal
                    // $('#myModal').show();
                },
                error: function(err) {
                    alert('Gagal mengambil data!');
                    console.log(err);
                }
            });
        });
        
        $(document).on('click', '#btn-destroy', function() {
            let id = $(this).data('id');
            let url = "{{ route('delete-product', ['id' => '__id__']) }}".replace('__id__', id);
            // Panggil server via AJAX
            $.ajax({
                url: url, // sesuaikan dengan route kamu
                method: 'GET',
                success: function(response) {
                    $('#modal-body-destroy').html(response); // Masukkan ke modal
                    // $('#myModal').show();
                },
                error: function(err) {
                    alert('Gagal mengambil data!');
                    console.log(err);
                }
            });
        });

        // Tutup modal saat klik X
        // $('.close').click(function() {
        //     $('#myModal').hide();
        // });

    </script>
</x-admin>
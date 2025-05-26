
<!-- Modal body -->
<div class="p-4 md:p-5 space-y-4 md:flex gap-5">
    @if($product->picture)
        <a class="example-image-link" data-title="Product Picture" href="{{ asset('images/products/' . $product->picture) }}" data-lightbox="example-1">
        {!! '<img src="' . asset('images/products/' . $product->picture) . '" alt="Product Picture" width="200px" class="m-0 h-full rounded object-cover">' !!}
        </a>
    @else
        <a class="example-image-link" data-title="Product Picture" href="{{ asset('images/product.png') }}" data-lightbox="example-1">
            {!! '<img src="' . asset('images/product.png') . '" alt="Product Picture" width="200px" class="m-0 h-full rounded object-cover">' !!}
        </a>
    @endif
    <table class="w-full">
        <tr>
            <td>Name</td>
            <td>: {{ $product->name }}</td>
        </tr>
        <tr>
            <td>Description</td>
            <td>: {{ $product->description }}</td>
        </tr>
        <tr>
            <td>Price</td>
            <td>: <i class="fa-solid fa-coins"></i> {{ $product->price }}PK</td>
        </tr>
        <tr>
            <td>Category</td>
            <td>: {{ $product->category }}</td>
        </tr>
        {{-- <tr>
            <td>Link</td>
            <td>:
                @if ($product->link)
                    <a href="{{ $product->link }}" class="text-blue-500" target="_blank">{{ Str::limit($product->link, 30) }}</a>
                @else
                    -
                @endif
            </td>
        </tr> --}}
    </table>
    <div class="grid grid-cols-1 grid-rows-2 gap-6 h-full w-5/12">
        @if($product->purchased)
            <a href="{{ asset('folders/' . $product->file) }}" class="h-full w-full text-white px-4 py-2 font-semibold flex justify-center items-center bg-green-500 rounded hover:bg-green-700 cursor-pointer" download="{{ $product->name }}">
                Download
            </a>
        @else
            <form method="POST" action="{{ route('store-transaction', [$product->id]) }}">
                @csrf
                @method("POST")
                <button type="submit" data-modal-hide="trash" type="button" class="h-full w-full text-white px-4 py-2 font-semibold flex justify-center items-center bg-green-500 rounded hover:bg-green-700 cursor-pointer">
                    Buy
                </button>
            </form>
        @endif
        @if ($product->link)
            <a href="{{ $product->link }}" class="h-full w-full text-white px-4 py-2 font-semibold flex justify-center items-center bg-blue-500 rounded hover:bg-blue-700 cursor-pointer">
                Preview
            </a>
        @endif
    </div>
</div>
<div class="space-y-4 gap-5">
    @php
        $fullStars = floor($average_rating); // bintang penuh
        $halfStar = ($average_rating - $fullStars) >= 0.5; // apakah perlu bintang setengah?
        $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0); // sisa bintang kosong
    @endphp
    <h3 class="text-2xl font-bold px-4 md:px-5 flex items-center gap-2">
        Reviews ({{ count($reviews) }})
        <span class="text-yellow-400 flex items-center">
            {{-- Bintang Penuh --}}
            @for ($i = 0; $i < $fullStars; $i++)
                <i class="fa-solid fa-star text-amber-400"></i>
            @endfor

            {{-- Bintang Setengah --}}
            @if ($halfStar)
                <i class="fa-solid fa-star-half-stroke text-amber-400"></i>
            @endif

            {{-- Bintang Kosong --}}
            @for ($i = 0; $i < $emptyStars; $i++)
                <i class="fa-regular fa-star text-gray-500"></i>
            @endfor

            {{-- Angka rata-rata --}}
            <span class="ml-2 text-white text-sm">({{ number_format($average_rating, 1) }})</span>
        </span>
    </h3>
    <div class="px-4 md:px-5">
</div>



    <div class="h-[300px] overflow-auto space-y-4 px-4 md:px-5">
        
        @if($product->purchased && auth()->user()->role == "pembeli")
            <form method="POST" class="space-y-4 bg-gray-900 p-5 rounded-xl mt-6 border border-gray-700" action="{{ route('store-review', [$product->id]) }}">
                @csrf
                @method("POST")
                {{-- <h3 class="text-xl font-semibold text-white">Review</h3> --}}

                {{-- Input Rating --}}
                {{-- <label for="rating" class="block text-gray-300">Rating:</label>
                <select name="rating" id="rating" required class="w-full p-2 rounded bg-gray-800 text-white border border-gray-600">
                    <option value="">-- Pilih Rating --</option>
                    <option value="5">5 - Sangat Bagus</option>
                    <option value="4">4 - Bagus</option>
                    <option value="3">3 - Biasa</option>
                    <option value="2">2 - Buruk</option>
                    <option value="1">1 - Sangat Buruk</option>
                </select> --}}

                {{-- Input Rating --}}
                <label for="rating" class="block text-gray-300 mb-2">Rating:</label>
                <div id="starRating" class="flex gap-1 text-2xl cursor-pointer text-gray-500">
                    @for ($i = 1; $i <= 5; $i++)
                        <span class="star" data-value="{{ $i }}">
                            <i class="fa-solid fa-star"></i>
                        </span>
                    @endfor
                </div>
                <input type="hidden" name="rating" id="rating" required>


                {{-- Input Komentar --}}
                <label for="comment" class="block text-gray-300">Komentar:</label>
                <textarea name="comment" id="comment" rows="4" required class="w-full p-2 rounded bg-gray-800 text-white border border-gray-600" placeholder="Tulis komentarmu di sini..."></textarea>

                <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">
                    Kirim Review
                </button>
            </form>
        @endif
        @forelse ($reviews as $review)
            <div class="bg-gray-800 rounded-xl p-4 md:p-5 border border-gray-700 shadow-sm hover:shadow-lg transition">
                <div class="flex gap-4 items-center">
                    @if(isset($review->user->image))
                        {!! '<img src="' . asset('images/photos/' . $review->user->image) . '" alt="Profil User" class="w-12 h-12 object-cover rounded-full border border-white">' !!}
                    @else
                        <img src="{{ asset('images/user.jpg') }}" alt="" class="w-12 h-12 object-cover rounded-full border border-white">
                    @endif
                    <div>
                        <p class="font-semibold text-white">{{ $review->user->name }}</p>
                        <div>
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fa-solid fa-star {{ $i <= $review->rating ? 'text-amber-300' : 'text-gray-600' }}"></i>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-gray-300">
                    {{ $review->comment }}
                </div>
            </div>
        @empty
            <div class="text-gray-400 text-center mt-5">Belum ada review.</div>
        @endforelse
    </div>
</div>


<!-- Modal footer -->
{{-- <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
    <button data-modal-hide="details" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
    <button data-modal-hide="details" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
</div> --}}
    {{-- <script>
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
    </script> --}}

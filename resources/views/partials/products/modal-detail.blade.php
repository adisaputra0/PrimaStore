
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
            <td>: {{ $product->price }}PK</td>
        </tr>
        <tr>
            <td>Category</td>
            <td>: {{ $product->category }}</td>
        </tr>
        <tr>
            <td>Link</td>
            <td>:
                @if ($product->link)
                    <a href="{{ $product->link }}" class="text-blue-500" target="_blank">{{ Str::limit($product->link, 30) }}</a>
                @else
                    -
                @endif
            </td>
        </tr>
    </table>
    
    <a href="{{ asset('folders/' . $product->file) }}" class="text-white px-4 py-2 font-semibold flex justify-center items-center bg-green-500 rounded hover:bg-green-700 cursor-pointer" download="{{ $product->name }}">
        Download
    </a>
</div>
<div class="space-y-4 gap-5">
    <h3 class="text-2xl font-bold px-4 md:px-5">Reviews ({{ count($reviews) }})</h3>
    <div class="h-[200px] overflow-auto">
        @forelse ($reviews as $review)
            <div class="p-4 md:p-5 bg-gray-800 border-b">
                <div class="flex w-full gap-5">
                    <div>
                        <img src="{{ asset('images/user.jpg') }}" alt="" class="w-[50px] h-[50px] object-cover rounded-full">
                    </div>
                    <div>
                        <p class="font-bold">{{ $review->user->name }}</p>
                        <p>
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fa-solid fa-star {{ $i <= $review->rating ? 'text-amber-300' : '' }}"></i>
                            @endfor
                        </p>
                    </div>
                </div>
                <div class="mt-5">
                    {{ $review->comment }}
                </div>
            </div>
        @empty
            <div class="p-4 text-gray-400">Belum ada review.</div>
        @endforelse
    </div>
</div>

<!-- Modal footer -->
{{-- <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
    <button data-modal-hide="details" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
    <button data-modal-hide="details" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
</div> --}}
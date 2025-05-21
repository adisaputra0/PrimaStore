
<!-- Modal body -->
<div class="p-4 md:p-5 space-y-4 md:flex gap-5">
    @if($product->picture)
        {!! '<img src="' . asset('images/products/' . $product->picture) . '" alt="Profil User" width="200px" class="m-0 h-full rounded object-cover">' !!}
    @else
        {!! '<img src="' . asset('images/products.png') . '" alt="Profil User" width="200px" class="m-0 h-full rounded object-cover">' !!}
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
            <td>: {{ $product->price }}</td>
        </tr>
        <tr>
            <td>Category</td>
            <td>: {{ $product->category }}</td>
        </tr>
        <tr>
            <td>File</td>
            <td>: {{ $product->file }}</td>
        </tr>
        <tr>
            <td>Link</td>
            <td><a href="{{ $product->link }}">{{ Str::limit($product->link, 30) }}</a></td>
        </tr>
    </table>
</div>
<!-- Modal footer -->
{{-- <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
    <button data-modal-hide="details" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
    <button data-modal-hide="details" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
</div> --}}
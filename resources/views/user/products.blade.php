<x-user>
    <style>
        #myTable_wrapper{
            width: 1200px;
        }
    </style>
    @if(auth()->user()->role == "admin" || auth()->user()->role == "penjual")
        <div class="dark:text-white">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <strong>Oops!</strong> Ada kesalahan pada input:<br><br>
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
        <div class="flex flex-col items-center md:items-start md:justify-start p-5 py-20 md:p-20 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800 dark:text-white">
            <div class="flex justify-between items-center w-[100%] mb-10">
                <h1 class="dark:text-white font-bold text-5xl">PRODUCTS</h1>
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
                <h1 class="dark:text-white font-bold text-5xl">PRODUCTS</h1>
                <!-- Modal toggle -->
                @if(auth()->user()->role == "penjual")
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-white px-4 py-2 font-semibold bg-green-500 rounded hover:bg-green-700 cursor-pointer" type="button">
                        + Add Product
                    </button>
                @endif
            </div>
            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800" data-aos="fade-up" data-aos-duration="700">
                <div class="h-56 w-full">
                    <a href="#">
                    <img class="mx-auto h-full dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg" alt="" />
                    <img class="mx-auto hidden h-full dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg" alt="" />
                    </a>
                </div>
                <div class="pt-6">
                    <div class="mb-4 flex items-center justify-between gap-4">
                    <span class="me-2 rounded bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-300"> Up to 35% off </span>
        
                    <div class="flex items-center justify-end gap-1">
                        <button type="button" data-tooltip-target="tooltip-quick-look" class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only"> Quick look </span>
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        </button>
                        <div id="tooltip-quick-look" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700" data-popper-placement="top">
                        Quick look
                        <div class="tooltip-arrow" data-popper-arrow=""></div>
                        </div>
        
                        <button type="button" data-tooltip-target="tooltip-add-to-favorites" class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <span class="sr-only"> Add to Favorites </span>
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z" />
                        </svg>
                        </button>
                        <div id="tooltip-add-to-favorites" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700" data-popper-placement="top">
                        Add to favorites
                        <div class="tooltip-arrow" data-popper-arrow=""></div>
                        </div>
                    </div>
                    </div>
        
                    <a href="#" class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">Apple iMac 27", 1TB HDD, Retina 5K Display, M3 Max</a>
        
                    <div class="mt-2 flex items-center gap-2">
                    <div class="flex items-center">
                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                        </svg>
        
                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                        </svg>
        
                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                        </svg>
        
                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                        </svg>
        
                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                        </svg>
                    </div>
        
                    <p class="text-sm font-medium text-gray-900 dark:text-white">5.0</p>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">(455)</p>
                    </div>
        
                    <ul class="mt-2 flex items-center gap-4">
                    <li class="flex items-center gap-2">
                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                        </svg>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Fast Delivery</p>
                    </li>
        
                    <li class="flex items-center gap-2">
                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                        </svg>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Best Price</p>
                    </li>
                    </ul>
        
                    <div class="mt-4 flex items-center justify-between gap-4">
                    <p class="text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">$1,699</p>
        
                    <button type="button" class="inline-flex items-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4  focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                        </svg>
                        Add to cart
                    </button>
                    </div>
                </div>
            </div>
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
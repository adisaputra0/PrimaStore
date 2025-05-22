<x-user>
    <style>
        #myTable_wrapper{
            width: 1200px;
        }
    </style>
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
        <div id="crud-modal" data-modal-placement="center" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center w-full md:inset-0 h-[100%] max-h-full bg-[rgba(0,0,0,0.5)]">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Create Withdraw
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form method="POST" action="{{ route('store-withdraw') }}" enctype="multipart/form-data" class="p-4 md:p-5 mb-5">
                        @csrf
                        @method("POST")
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <input type="text" name="user_id" id="user_id" hidden placeholder="Type name" value="{{ auth()->user()->id }}">
                            <div>
                                <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                                <input type="number" name="amount" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type amount" required="">
                            </div>
                            <div>
                                <label for="bank_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bank Name</label>
                                <input type="text" name="bank_name" id="bank_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type bank name" required="">
                            </div>
                            <div>
                                <label for="bank_account" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bank Account</label>
                                <input type="text" name="bank_account" id="bank_account" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type bank account" required="">
                            </div>
                            <div>
                                <label for="account_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Account Name</label>
                                <input type="text" name="account_name" id="account_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type account name" required="">
                            </div>
                        </div>
                        <button type="submit" class="w-[100%] mx-auto text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            Add Withdraw
                        </button>
                    </form>
                </div>
            </div>
        </div>           
        <!-- Edit modal -->
        <div id="edit" tabindex="-1" class="h-full bg-[rgba(0,0,0,0.5)] hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <div id="modal-body-edit">
                        </div>
                        {{-- <button data-modal-hide="edit" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button> --}}
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
    </div>
    <div class="flex flex-col items-center md:items-start md:justify-start p-5 py-20 md:p-20 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800 dark:text-white">
        <div class="flex justify-between items-center w-[100%] mb-10">
            <h1 class="dark:text-white font-bold text-5xl">WITHDRAWS</h1>
            <!-- Modal toggle -->
            @if(auth()->user()->role == "penjual")
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-white px-4 py-2 font-semibold bg-green-500 rounded hover:bg-green-700 cursor-pointer" type="button">
                    + Add Withdraw
                </button>
            @endif
        </div>
        <div id="container-table">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Amount</th>
                        <th>Bank Name</th>
                        <th>Bank Account</th>
                        <th>Account Name</th>
                        <th>Status</th>
                        @if(auth()->user()->role == "admin")
                            <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($withdraws as $index => $withdraw)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $withdraw->user->name }}</td>
                            <td>{{ $withdraw->amount }}PK</td>
                            {{-- <td>{{ Str::limit($withdraw->description, 10) }}</td> --}}
                            <td>{{ $withdraw->bank_name }}</td>
                            <td>{{ $withdraw->bank_account }}</td>
                            <td>{{ $withdraw->account_name }}</td>
                            <td>{{ $withdraw->status }}</td>
                            @if(auth()->user()->role == "admin")
                                <td>
                                    @if($withdraw->status == "pending")
                                        <div class="flex items-center justify-center gap-3">
                                            <button id="btn-edit" data-modal-target="edit" data-modal-toggle="edit" data-id="{{ $withdraw->id }}" class="text-white px-4 py-2 font-semibold bg-green-500 rounded hover:bg-green-700 cursor-pointer">
                                                <i class="fa-solid fa-check"></i>
                                            </button>
                                            <button id="btn-destroy" data-modal-target="trash" data-modal-toggle="trash" data-id="{{ $withdraw->id }}" class="text-white px-4 py-2 font-semibold bg-red-500 rounded hover:bg-red-700 cursor-pointer" type="button">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </div>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>       
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).on('click', '#btn-edit', function() {
            let id = $(this).data('id');
            let url = "{{ route('approve-withdraw', ['id' => '__id__']) }}".replace('__id__', id);
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
            let url = "{{ route('reject-withdraw', ['id' => '__id__']) }}".replace('__id__', id);
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
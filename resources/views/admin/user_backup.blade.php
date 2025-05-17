<tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>Testing</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>
                        <div class="flex items-center justify-center gap-3">
                            <button data-modal-target="trash" data-modal-toggle="trash" class="text-white px-4 py-2 font-semibold bg-red-500 rounded hover:bg-red-700 cursor-pointer" type="button">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <i class="text-white fa-solid fa-pen px-4 py-2 font-semibold bg-orange-500 rounded hover:bg-orange-700 cursor-pointer"></i>
                            <button data-modal-target="details" data-modal-toggle="details" class="text-white px-4 py-2 font-semibold bg-blue-500 rounded hover:bg-blue-700 cursor-pointer" type="button">
                                <i class="fa-solid fa-eye"></i>
                            </button>

                        </div>
                    </td>
                </tr>

                <div id="trash" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="trash">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                                <button data-modal-hide="trash" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Yes, I'm sure
                                </button>
                                <button data-modal-hide="trash" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Top Left Modal -->
                <div id="details" data-modal-placement="center" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                    Top left modal
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="details">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                                </p>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="details" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                                <button data-modal-hide="details" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                            </div>
                        </div>
                    </div>
                </div>


                <tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>Testing</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>
                        <div class="flex items-center justify-center gap-3">
                            <i class="text-white fa-solid fa-trash px-4 py-2 font-semibold bg-red-500 rounded hover:bg-red-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-pen px-4 py-2 font-semibold bg-orange-500 rounded hover:bg-orange-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-eye px-4 py-2 font-semibold bg-blue-500 rounded hover:bg-blue-700 cursor-pointer"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>Testing</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>
                        <div class="flex items-center justify-center gap-3">
                            <i class="text-white fa-solid fa-trash px-4 py-2 font-semibold bg-red-500 rounded hover:bg-red-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-pen px-4 py-2 font-semibold bg-orange-500 rounded hover:bg-orange-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-eye px-4 py-2 font-semibold bg-blue-500 rounded hover:bg-blue-700 cursor-pointer"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>Testing</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>
                        <div class="flex items-center justify-center gap-3">
                            <i class="text-white fa-solid fa-trash px-4 py-2 font-semibold bg-red-500 rounded hover:bg-red-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-pen px-4 py-2 font-semibold bg-orange-500 rounded hover:bg-orange-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-eye px-4 py-2 font-semibold bg-blue-500 rounded hover:bg-blue-700 cursor-pointer"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>Testing</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>
                        <div class="flex items-center justify-center gap-3">
                            <i class="text-white fa-solid fa-trash px-4 py-2 font-semibold bg-red-500 rounded hover:bg-red-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-pen px-4 py-2 font-semibold bg-orange-500 rounded hover:bg-orange-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-eye px-4 py-2 font-semibold bg-blue-500 rounded hover:bg-blue-700 cursor-pointer"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>Testing</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>
                        <div class="flex items-center justify-center gap-3">
                            <i class="text-white fa-solid fa-trash px-4 py-2 font-semibold bg-red-500 rounded hover:bg-red-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-pen px-4 py-2 font-semibold bg-orange-500 rounded hover:bg-orange-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-eye px-4 py-2 font-semibold bg-blue-500 rounded hover:bg-blue-700 cursor-pointer"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>Testing</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>
                        <div class="flex items-center justify-center gap-3">
                            <i class="text-white fa-solid fa-trash px-4 py-2 font-semibold bg-red-500 rounded hover:bg-red-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-pen px-4 py-2 font-semibold bg-orange-500 rounded hover:bg-orange-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-eye px-4 py-2 font-semibold bg-blue-500 rounded hover:bg-blue-700 cursor-pointer"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>Testing</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>
                        <div class="flex items-center justify-center gap-3">
                            <i class="text-white fa-solid fa-trash px-4 py-2 font-semibold bg-red-500 rounded hover:bg-red-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-pen px-4 py-2 font-semibold bg-orange-500 rounded hover:bg-orange-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-eye px-4 py-2 font-semibold bg-blue-500 rounded hover:bg-blue-700 cursor-pointer"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>Testing</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>
                        <div class="flex items-center justify-center gap-3">
                            <i class="text-white fa-solid fa-trash px-4 py-2 font-semibold bg-red-500 rounded hover:bg-red-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-pen px-4 py-2 font-semibold bg-orange-500 rounded hover:bg-orange-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-eye px-4 py-2 font-semibold bg-blue-500 rounded hover:bg-blue-700 cursor-pointer"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>Testing</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>
                        <div class="flex items-center justify-center gap-3">
                            <i class="text-white fa-solid fa-trash px-4 py-2 font-semibold bg-red-500 rounded hover:bg-red-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-pen px-4 py-2 font-semibold bg-orange-500 rounded hover:bg-orange-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-eye px-4 py-2 font-semibold bg-blue-500 rounded hover:bg-blue-700 cursor-pointer"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>Testing</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>
                        <div class="flex items-center justify-center gap-3">
                            <i class="text-white fa-solid fa-trash px-4 py-2 font-semibold bg-red-500 rounded hover:bg-red-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-pen px-4 py-2 font-semibold bg-orange-500 rounded hover:bg-orange-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-eye px-4 py-2 font-semibold bg-blue-500 rounded hover:bg-blue-700 cursor-pointer"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>Testing</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>
                        <div class="flex items-center justify-center gap-3">
                            <i class="text-white fa-solid fa-trash px-4 py-2 font-semibold bg-red-500 rounded hover:bg-red-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-pen px-4 py-2 font-semibold bg-orange-500 rounded hover:bg-orange-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-eye px-4 py-2 font-semibold bg-blue-500 rounded hover:bg-blue-700 cursor-pointer"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>Testing</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>
                        <div class="flex items-center justify-center gap-3">
                            <i class="text-white fa-solid fa-trash px-4 py-2 font-semibold bg-red-500 rounded hover:bg-red-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-pen px-4 py-2 font-semibold bg-orange-500 rounded hover:bg-orange-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-eye px-4 py-2 font-semibold bg-blue-500 rounded hover:bg-blue-700 cursor-pointer"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>Testing</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>
                        <div class="flex items-center justify-center gap-3">
                            <i class="text-white fa-solid fa-trash px-4 py-2 font-semibold bg-red-500 rounded hover:bg-red-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-pen px-4 py-2 font-semibold bg-orange-500 rounded hover:bg-orange-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-eye px-4 py-2 font-semibold bg-blue-500 rounded hover:bg-blue-700 cursor-pointer"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>Testing</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>
                        <div class="flex items-center justify-center gap-3">
                            <i class="text-white fa-solid fa-trash px-4 py-2 font-semibold bg-red-500 rounded hover:bg-red-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-pen px-4 py-2 font-semibold bg-orange-500 rounded hover:bg-orange-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-eye px-4 py-2 font-semibold bg-blue-500 rounded hover:bg-blue-700 cursor-pointer"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>Testing</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>
                        <div class="flex items-center justify-center gap-3">
                            <i class="text-white fa-solid fa-trash px-4 py-2 font-semibold bg-red-500 rounded hover:bg-red-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-pen px-4 py-2 font-semibold bg-orange-500 rounded hover:bg-orange-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-eye px-4 py-2 font-semibold bg-blue-500 rounded hover:bg-blue-700 cursor-pointer"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>Testing</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>
                        <div class="flex items-center justify-center gap-3">
                            <i class="text-white fa-solid fa-trash px-4 py-2 font-semibold bg-red-500 rounded hover:bg-red-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-pen px-4 py-2 font-semibold bg-orange-500 rounded hover:bg-orange-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-eye px-4 py-2 font-semibold bg-blue-500 rounded hover:bg-blue-700 cursor-pointer"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>Testing</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>
                        <div class="flex items-center justify-center gap-3">
                            <i class="text-white fa-solid fa-trash px-4 py-2 font-semibold bg-red-500 rounded hover:bg-red-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-pen px-4 py-2 font-semibold bg-orange-500 rounded hover:bg-orange-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-eye px-4 py-2 font-semibold bg-blue-500 rounded hover:bg-blue-700 cursor-pointer"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>Testing</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>
                        <div class="flex items-center justify-center gap-3">
                            <i class="text-white fa-solid fa-trash px-4 py-2 font-semibold bg-red-500 rounded hover:bg-red-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-pen px-4 py-2 font-semibold bg-orange-500 rounded hover:bg-orange-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-eye px-4 py-2 font-semibold bg-blue-500 rounded hover:bg-blue-700 cursor-pointer"></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>Testing</td>
                    <td>Adi Saputra</td>
                    <td>adi@example.com</td>
                    <td>Denpasar</td>
                    <td>
                        <div class="flex items-center justify-center gap-3">
                            <i class="text-white fa-solid fa-trash px-4 py-2 font-semibold bg-red-500 rounded hover:bg-red-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-pen px-4 py-2 font-semibold bg-orange-500 rounded hover:bg-orange-700 cursor-pointer"></i>
                            <i class="text-white fa-solid fa-eye px-4 py-2 font-semibold bg-blue-500 rounded hover:bg-blue-700 cursor-pointer"></i>
                        </div>
                    </td>
                </tr>

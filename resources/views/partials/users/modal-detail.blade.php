
<!-- Modal body -->
<div class="p-4 md:p-5 space-y-4 md:flex gap-5">
    @if($user->image)
        <a class="example-image-link" data-title="Profil User" href="{{ asset('images/photos/' . $user->image) }}" data-lightbox="example-1">
            {!! '<img src="' . asset('images/photos/' . $user->image) . '"  alt="Profil User" width="200px" class="m-0 h-full rounded object-cover">' !!}
        </a>
    @else
        <a class="example-image-link" data-title="Profil User" href="{{ asset('images/user.jpg') }}" data-lightbox="example-1">
            {!! '<img src="' . asset('images/user.jpg') . '" alt="Profil User" width="200px" class="m-0 h-full rounded object-cover">' !!}
        </a>
    @endif
    <table class="w-full">
        <tr>
            <td>Name</td>
            <td>: {{ $user->name }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: {{ $user->email }}</td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>: {{ $user->phone? $user->phone:"-" }}</td>
        </tr>
        {{-- <tr>
            <td>Image</td>
            <td>
                @if(isset($user->image))
                    {!! '<img src="' . asset('images/photos/' . $user->image) . '" alt="Profil User" width="200px" class="rounded">' !!}
                @else
                    -
                @endif
            </td>
        </tr> --}}
        <tr>
            <td>Bio</td>
            <td>: {{ $user->bio }}</td>
        </tr>
        <tr>
            <td>KTM</td>
            <td>:
                @if(isset($user->ktm))
                    {{-- {!! '<img src="' . asset('images/ktm/' . $user->ktm) . '" alt="KTM" width="100px" class="rounded">' !!} --}}
                    <a class="example-image-link text-blue-500" data-title="KTM User" href="{{ asset('images/ktm/' . $user->ktm) }}" data-lightbox="example-1">
                        {{ $user->ktm }}
                    </a>
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <td>Is Verified</td>
            <td>: {{ $user->is_verified? "verified" : "not verified" }}</td>
        </tr>
        <tr>
            <td>Role</td>
            <td>: {{ $user->role }}</td>
        </tr>
    </table>
</div>
<!-- Modal footer -->
{{-- <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
    <button data-modal-hide="details" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
    <button data-modal-hide="details" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
</div> --}}
@extends('layouts.dashboard')

@section('title', 'Module Pets: Larapets')

@section('content')

    <h1 class="text-4xl text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutral-50 mb-5 mt-15">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#fff" viewBox="0 0 256 256">
            <path
                d="M212,80a28,28,0,1,0,28,28A28,28,0,0,0,212,80Zm0,40a12,12,0,1,1,12-12A12,12,0,0,1,212,120ZM72,108a28,28,0,1,0-28,28A28,28,0,0,0,72,108ZM44,120a12,12,0,1,1,12-12A12,12,0,0,1,44,120ZM92,88A28,28,0,1,0,64,60,28,28,0,0,0,92,88Zm0-40A12,12,0,1,1,80,60,12,12,0,0,1,92,48Zm72,40a28,28,0,1,0-28-28A28,28,0,0,0,164,88Zm0-40a12,12,0,1,1-12,12A12,12,0,0,1,164,48Zm23.12,100.86a35.3,35.3,0,0,1-16.87-21.14,44,44,0,0,0-84.5,0A35.25,35.25,0,0,1,69,148.82,40,40,0,0,0,88,224a39.48,39.48,0,0,0,15.52-3.13,64.09,64.09,0,0,1,48.87,0,40,40,0,0,0,34.73-72ZM168,208a24,24,0,0,1-9.45-1.93,80.14,80.14,0,0,0-61.19,0,24,24,0,0,1-20.71-43.26,51.22,51.22,0,0,0,24.46-30.67,28,28,0,0,1,53.78,0,51.27,51.27,0,0,0,24.53,30.71A24,24,0,0,1,168,208Z">
            </path>
        </svg>
        Make Adoption
    </h1>



    <label class="input text-white bg-[#0009] outline-none mb-2">
        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.3-4.3"></path>
            </g>
        </svg>
        <input type="search" placeholder="Search..." name="q" id="qsearch" />

    </label>




    <div class="overflow-x-auto rounded-box border text-white bg-[#0009]">
        <table class="table">
            <thead>
                <tr class="text-white">
                    <th class="hidden md:table-cell">Id</th>
                    <th>Photo</th>
                    <th class="hidden md:table-cell">Name</th>
                    <th>Kind</th>
                    <th class="hidden md:table-cell">Breed</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody class="datalist">

                @foreach ($pets as $pet)
                    <tr @if ($pet->id % 2 == 0) class="bg-[#0006]" @endif>

                        <td class="hidden md:table-cell">{{ $pet->id }}</td>

                        <td>
                            <div class="avatar">
                                <div class="mask mask-squircle w-12">
                                    <img
                                        src="{{ asset($pet->image ? 'images/' . $pet->image : 'images/no-image.png') }}" />x|
                                </div>
                            </div>
                        </td>

                        <td class="hidden md:table-cell">{{ $pet->name }}</td>
                        <td>
                            @if ($pet->kind == 'Dog')
                                <span class="badge bg-blue-500 text-white px-2 py-1 rounded">Dog</span>
                            @elseif ($pet->kind == 'Cat')
                                <span class="badge bg-purple-500 text-white px-2 py-1 rounded">Cat</span>
                            @elseif ($pet->kind == 'Bird')
                                <span class="badge bg-green-500 text-white px-2 py-1 rounded">Bird</span>
                            @elseif ($pet->kind == 'Pig')
                                <span class="badge bg-yellow-500 text-white px-2 py-1 rounded">Pig</span>
                            @else
                                <span class="badge bg-gray-500 text-white px-2 py-1 rounded">Otro</span>
                            @endif
                        </td>

                        <td class="hidden md:table-cell">
                            {{ $pet->breed }}
                        </td>

                        <td>
                            @if ($pet->status == 1)
                                <div class="badge badge-accent">Adopted</div>
                            @else
                                <div class="badge badge-error">Available</div>
                            @endif
                        </td>

                        <td>
                            <!-- VIEW -->
                            <a class="btn btn-xs btn-outline" href="{{ url('makeadoption/' . $pet->id) }}" title="Adopt {{ $pet->name }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="#fff"
                                    viewBox="0 0 256 256">
                                    <path
                                        d="M223,57a58.07,58.07,0,0,0-81.92-.1L128,69.05,114.91,56.86A58,58,0,0,0,33,139l89.35,90.66a8,8,0,0,0,11.4,0L223,139a58,58,0,0,0,0-82Zm-11.35,70.76L128,212.6,44.3,127.68a42,42,0,0,1,59.4-59.4l.2.2,18.65,17.35a8,8,0,0,0,10.9,0L152.1,68.48l.2-.2a42,42,0,1,1,59.36,59.44Z">
                                    </path>
                                </svg>
                            </a>

                            <form class="hidden" method="POST" action="{{ url('pets/' . $pet->id) }}">
                                @csrf
                                @method('delete')
                            </form>
                        </td>

                    </tr>
                @endforeach

                <tr class="bg-[#0008]">
                    <td colspan="7">{{ $pets->links('layouts.pagination') }}</td>
                </tr>

            </tbody>
        </table>

    </div>


    <dialog id="modal_message" class="modal">
        <div class="modal-box bg-success">
            <h3 class="text-lg font-bold">Congratulations!</h3>
            <div role="alert" class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('message') }}</span>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    <dialog id="modal_delete" class="modal">
        <div class="modal-box bg-error bg-[#fff]">
            <h3 class="text-lg font-bold ">Are you sure?</h3>
            <div role="alert" class="alert alert-error mt-2 bg-[#ff000088]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="h-6 w-6 shrink-0 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Do you want to delete: <strong class="name"></strong></span>
            </div>
            <div class="flex gap-2 mt-4">
                <button
                    class="btn btn-soft btn-success text-black border-[#2e2e2e98] btn-sm bg-[#02b95e67] hover:bg-[#04fc80dc] btn-confirm">Confirm</button>
                <form method="dialog">
                    <button
                        class="btn btn-default btn-sm border-[#2e2e2e98] bg-[#9da2a367] hover:bg-[#646464dc]">Cancel</button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>Cancel</button>
        </form>
    </dialog>

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            //Modal
            const modal_message = document.getElementById('modal_message');
            @if (session('success'))
                modal_message.showModal();
            @endif

            // Search
            function debounce(func, wait) {
                let timeout
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout)
                        func(...args)
                    };
                    clearTimeout(timeout)
                    timeout = setTimeout(later, wait)
                }
            }
            const search = debounce(function(query) {

                $token = $('input[name=_token]').val()

                $.post("search/makeadoption", {
                        'q': query,
                        '_token': $token
                    },
                    function(data) {
                        $('.datalist').html(data).hide().fadeIn(1000)
                    }
                )
            }, 500)
            $('body').on('input', '#qsearch', function(event) {
                event.preventDefault()
                const query = $(this).val()

                $('.datalist').html(`<tr>
                                        <td colspan="7" class="text-center py-18">
                                            <span class="loading loading-spinner text-warning"></span>
                                        </td>
                                    </tr>`)

                if (query != '') {
                    search(query)
                } else {
                    setTimeout(() => {
                        window.location.replace('makeadoption')
                    }, 500)
                }
            })
        })
    </script>

@endsection

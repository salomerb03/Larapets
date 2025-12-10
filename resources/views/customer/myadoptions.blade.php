@extends('layouts.dashboard')

@section('title', 'My Adoptions: Larapets')

@section('content')

    <h1 class="text-4xl text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutral-50 mb-5 mt-15">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#fff" viewBox="0 0 256 256">
            <path
                d="M212,80a28,28,0,1,0,28,28A28,28,0,0,0,212,80Zm0,40a12,12,0,1,1,12-12A12,12,0,0,1,212,120ZM72,108a28,28,0,1,0-28,28A28,28,0,0,0,72,108ZM44,120a12,12,0,1,1,12-12A12,12,0,0,1,44,120ZM92,88A28,28,0,1,0,64,60,28,28,0,0,0,92,88Zm0-40A12,12,0,1,1,80,60,12,12,0,0,1,92,48Zm72,40a28,28,0,1,0-28-28A28,28,0,0,0,164,88Zm0-40a12,12,0,1,1-12,12A12,12,0,0,1,164,48Zm23.12,100.86a35.3,35.3,0,0,1-16.87-21.14,44,44,0,0,0-84.5,0A35.25,35.25,0,0,1,69,148.82,40,40,0,0,0,88,224a39.48,39.48,0,0,0,15.52-3.13,64.09,64.09,0,0,1,48.87,0,40,40,0,0,0,34.73-72ZM168,208a24,24,0,0,1-9.45-1.93,80.14,80.14,0,0,0-61.19,0,24,24,0,0,1-20.71-43.26,51.22,51.22,0,0,0,24.46-30.67,28,28,0,0,1,53.78,0,51.27,51.27,0,0,0,24.53,30.71A24,24,0,0,1,168,208Z">
            </path>
        </svg>
        My adoptions
    </h1>


    @csrf
    <div class="datalist flex justify-center items-center flex-col gap-4">
        @foreach ($adopts as $adopt)
            <div class="avatar-group -space-x-6">
                <div class="avatar">
                    <div class="w-24">
                        <img src="{{ asset('images/' . $adopt->user->photo) }}" />
                    </div>
                </div>
                <div class="avatar">
                    <div class="w-24">
                        <img src="{{ asset('images/' . $adopt->pet->image) }}" />
                    </div>
                </div>
            </div>
            <h4 class="text-white">
                <span class="underline font-bold">{{ $adopt->pet->name }}</span>
                adopted by
                <span>{{ $adopt->user->fullname }}</span>
                on {{ $adopt->created_at->diffForHumans() }}
            </h4>
            <a href="{{ 'myadoptions/' . $adopt->id }}" class="btn btn-info">
                More info
            </a>
            <span class="border b-1 border-white w-8/12"></span>

            
        @endforeach
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
        // Modal 
        $(document).ready(function() {

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

                $.post("search/adoptions", {
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

                $('.datalist').html(`
                                      <div class="text-center py-18">
                                          <span class="loading loading-spinner loading-xl"></span>
                                      </div>
                                    `)

                if (query != '') {
                    search(query)
                } else {
                    setTimeout(() => {
                        window.location.replace('adoptions')
                    }, 500);
                }
            })
            // Import
            $('.btn-import').click(function() {
                $('#file').click()
            })
            $('#file').change(function() {
                $(this).parent().submit()
            })
        })
    </script>

@endsection

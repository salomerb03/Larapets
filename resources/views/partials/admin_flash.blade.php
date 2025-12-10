@if(session('message') || session('error'))
    @php
        $text = session('message') ?? session('error');
        $isError = session('error') ? true : false;
    @endphp

    <dialog id="modal_message" class="modal">
        <div class="modal-box {{ $isError ? 'bg-error text-white' : 'bg-success text-white' }}">
            <h3 class="text-lg font-bold">{{ $isError ? 'Error' : 'Congratulations!' }}</h3>
            <div role="alert" class="alert {{ $isError ? 'alert-error' : 'alert-success' }}">
                @if(!$isError)
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                @endif
                <span>{{ $text }}</span>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('modal_message');
            if (modal && typeof modal.showModal === 'function') {
                try { modal.showModal(); } catch(e) { /* ignore */ }
                // close after 2.5s
                setTimeout(function(){ try { modal.close(); } catch(e){} }, 2500);
            }
        });
    </script>
@endif

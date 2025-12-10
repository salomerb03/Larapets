@forelse ($adopts as $adopt)
    <div class="avatar-group -space-x-6">
        <div class="avatar">
            <div class="w-28">
                <img src="{{ asset('images/' . $adopt->user->photo) }}" />
            </div>
        </div>
        <div class="avatar">
            <div class="w-28">
                <img src="{{ asset('images/' . $adopt->pet->image) }}" />
            </div>
        </div>
    </div>
    <h4>
        <span class="underline font-bold">{{ $adopt->pet->name }}</span>
        was adopted by
        <span class="underline font-bold">{{ $adopt->user->fullname }}</span>
        {{ $adopt->created_at->diffforhumans() }}
    </h4>
    <a href="{{ url('adoptions/' . $adopt->id) }}" class="btn btn-outline btn-succes text-black">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" viewBox="0 0 256 256">
            <path
                d="M237.2,151.87v0a47.1,47.1,0,0,0-2.35-5.45L193.26,51.8a7.82,7.82,0,0,0-1.66-2.44,32,32,0,0,0-45.26,0A8,8,0,0,0,144,55V80H112V55a8,8,0,0,0-2.34-5.66,32,32,0,0,0-45.26,0,7.82,7.82,0,0,0-1.66,2.44L21.15,146.4a47.1,47.1,0,0,0-2.35,5.45v0A48,48,0,1,0,112,168V96h32v72a48,48,0,1,0,93.2-16.13ZM76.71,59.75a16,16,0,0,1,19.29-1v73.51a47.9,47.9,0,0,0-46.79-9.92ZM64,200a32,32,0,1,1,32-32A32,32,0,0,1,64,200ZM160,58.74a16,16,0,0,1,19.29,1l27.5,62.58A47.9,47.9,0,0,0,160,132.25ZM192,200a32,32,0,1,1,32-32A32,32,0,0,1,192,200Z">
            </path>
        </svg>
        More info
    </a>
    <span class="border-b-1 border-dashed mt-8 border-[#fff6] h-2 w-4/12"></span>
@empty
    <div class="py-8 text-white">
        No results founded!
    </div>
@endforelse

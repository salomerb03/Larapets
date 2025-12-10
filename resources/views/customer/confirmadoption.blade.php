@extends('layouts.dashboard')

@section('title', 'Confirm Adoption: Larapets')

@section('content')

    <h1 class="text-4xl text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutral-50 mb-5 mt-15">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#fff" viewBox="0 0 256 256">
            <path
                d="M223,57a58.07,58.07,0,0,0-81.92-.1L128,69.05,114.91,56.86A58,58,0,0,0,33,139l89.35,90.66a8,8,0,0,0,11.4,0L223,139a58,58,0,0,0,0-82Zm-11.35,70.76L128,212.6,44.3,127.68a42,42,0,0,1,59.4-59.4l.2.2,18.65,17.35a8,8,0,0,0,10.9,0L152.1,68.48l.2-.2a42,42,0,1,1,59.36,59.44Z">
            </path>
        </svg>
        Confirm Adoption
    </h1>

    {{-- Breadcrumbs --}}
    <div class="breadcrumbs text-sm text-white mb-5">
        <ul>
            <li>
                <a href="{{ url('dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                        <path
                            d="M104,40H56A16,16,0,0,0,40,56v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,104,40Zm0,64H56V56h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,200,40Zm0,64H152V56h48v48Zm-96,32H56a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,104,136Zm0,64H56V152h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,200,136Zm0,64H152V152h48v48Z">
                        </path>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ url('makeadoption') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                        <path
                            d="M212,80a28,28,0,1,0,28,28A28,28,0,0,0,212,80Zm0,40a12,12,0,1,1,12-12A12,12,0,0,1,212,120ZM72,108a28,28,0,1,0-28,28A28,28,0,0,0,72,108ZM44,120a12,12,0,1,1,12-12A12,12,0,0,1,44,120ZM92,88A28,28,0,1,0,64,60,28,28,0,0,0,92,88Zm0-40A12,12,0,1,1,80,60,12,12,0,0,1,92,48Zm72,40a28,28,0,1,0-28-28A28,28,0,0,0,164,88Zm0-40a12,12,0,1,1-12,12A12,12,0,0,1,164,48Zm23.12,100.86a35.3,35.3,0,0,1-16.87-21.14,44,44,0,0,0-84.5,0A35.25,35.25,0,0,1,69,148.82,40,40,0,0,0,88,224a39.48,39.48,0,0,0,15.52-3.13,64.09,64.09,0,0,1,48.87,0,40,40,0,0,0,34.73-72ZM168,208a24,24,0,0,1-9.45-1.93,80.14,80.14,0,0,0-61.19,0,24,24,0,0,1-20.71-43.26,51.22,51.22,0,0,0,24.46-30.67,28,28,0,0,1,53.78,0,51.27,51.27,0,0,0,24.53,30.71A24,24,0,0,1,168,208Z">
                        </path>
                    </svg>
                    Make Adoption
                </a>
            </li>
            <li>
                <span class="inline-flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                        <path
                            d="M223,57a58.07,58.07,0,0,0-81.92-.1L128,69.05,114.91,56.86A58,58,0,0,0,33,139l89.35,90.66a8,8,0,0,0,11.4,0L223,139a58,58,0,0,0,0-82Zm-11.35,70.76L128,212.6,44.3,127.68a42,42,0,0,1,59.4-59.4l.2.2,18.65,17.35a8,8,0,0,0,10.9,0L152.1,68.48l.2-.2a42,42,0,1,1,59.36,59.44Z">
                        </path>
                    </svg>
                    Confirm Adoption
                </span>
            </li>
        </ul>
    </div>

    {{-- Pet Information Card --}}
    <div class="bg-[#0009] p-8 rounded-lg max-w-2xl mx-auto">
        {{-- Pet Image --}}
        <div class="flex justify-center mb-6">
            <div class="avatar">
                <div class="mask mask-squircle w-48">
                    <img src="{{ asset($pet->image ? 'images/' . $pet->image : 'images/no-image.png') }}" alt="{{ $pet->name }}" />
                </div>
            </div>
        </div>

        {{-- Pet Info --}}
        <div class="text-white space-y-4 mb-8">
            <div class="flex items-center justify-between border-b border-gray-600 pb-2">
                <span class="text-gray-400">Name:</span>
                <span class="text-lg font-semibold">{{ $pet->name }}</span>
            </div>

            <div class="flex items-center justify-between border-b border-gray-600 pb-2">
                <span class="text-gray-400">Kind:</span>
                <span class="badge badge-lg" style="background-color: 
                    @if($pet->kind == 'Dog') #3b82f6
                    @elseif($pet->kind == 'Cat') #a855f7
                    @elseif($pet->kind == 'Bird') #22c55e
                    @elseif($pet->kind == 'Pig') #eab308
                    @else #6b7280
                    @endif">
                    {{ $pet->kind }}
                </span>
            </div>

            <div class="flex items-center justify-between border-b border-gray-600 pb-2">
                <span class="text-gray-400">Breed:</span>
                <span class="text-lg">{{ $pet->breed }}</span>
            </div>

            <div class="flex items-center justify-between border-b border-gray-600 pb-2">
                <span class="text-gray-400">Age:</span>
                <span class="text-lg">{{ $pet->age }} years</span>
            </div>

            <div class="flex items-center justify-between border-b border-gray-600 pb-2">
                <span class="text-gray-400">Weight:</span>
                <span class="text-lg">{{ $pet->weight }} kg</span>
            </div>

            <div class="flex items-center justify-between border-b border-gray-600 pb-2">
                <span class="text-gray-400">Location:</span>
                <span class="text-lg">{{ $pet->location }}</span>
            </div>

            <div class="border-b border-gray-600 pb-2">
                <span class="text-gray-400">Description:</span>
                <p class="text-lg mt-2">{{ $pet->description }}</p>
            </div>
        </div>

        {{-- Confirmation Alert --}}
        <div role="alert" class="alert alert-warning mb-6 bg-yellow-600 border-yellow-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4v2m0 0a9 9 0 110-18 9 9 0 010 18z" />
            </svg>
            <span>Are you sure you want to adopt <strong>{{ $pet->name }}</strong>?</span>
        </div>

    
        <div class="flex gap-4 justify-center ">
            

            <form method="POST" action="{{ url('makeadoption') }}" class="inline">
                @csrf
                <input type="hidden" name="pet_id" value="{{ $pet->id }}">
                <button type="submit" class="btn btn-success" id="confirmAdoptionBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M223,57a58.07,58.07,0,0,0-81.92-.1L128,69.05,114.91,56.86A58,58,0,0,0,33,139l89.35,90.66a8,8,0,0,0,11.4,0L223,139a58,58,0,0,0,0-82Zm-11.35,70.76L128,212.6,44.3,127.68a42,42,0,0,1,59.4-59.4l.2.2,18.65,17.35a8,8,0,0,0,10.9,0L152.1,68.48l.2-.2a42,42,0,1,1,59.36,59.44Z">
                        </path>
                    </svg>
                    Confirm Adoption
                </button>
            </form>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#confirmAdoptionBtn').click(function(e) {
                e.preventDefault();
                
                const petName = '{{ $pet->name }}';
                
                if (confirm(`Are you sure you want to adopt ${petName}? This action cannot be undone.`)) {
                    $(this).closest('form').submit();
                }
            });
        });
    </script>
@endsection

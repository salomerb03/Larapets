@extends('layouts.dashboard')

@section('title', 'Show Adoption: Larapets 🐶')

@section('content')
    <h1 class="text-4xl text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutra-50 mt-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256">
            <path
                d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm48-88a8,8,0,0,1-8,8H136v32a8,8,0,0,1-16,0V136H88a8,8,0,0,1,0-16h32V88a8,8,0,0,1,16,0v32h32A8,8,0,0,1,176,128Z">
            </path>
        </svg>
        Show Adoption
    </h1>
    {{-- Breadcrumbs --}}
    <div class="breadcrumbs text-sm text-white mt-2" >
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
                <a href="{{ url('pets') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                        <path
                            d="M117.25,157.92a60,60,0,1,0-66.5,0A95.83,95.83,0,0,0,3.53,195.63a8,8,0,1,0,13.4,8.74,80,80,0,0,1,134.14,0,8,8,0,0,0,13.4-8.74A95.83,95.83,0,0,0,117.25,157.92ZM40,108a44,44,0,1,1,44,44A44.05,44.05,0,0,1,40,108Zm210.14,98.7a8,8,0,0,1-11.07-2.33A79.83,79.83,0,0,0,172,168a8,8,0,0,1,0-16,44,44,0,1,0-16.34-84.87,8,8,0,1,1-5.94-14.85,60,60,0,0,1,55.53,105.64,95.83,95.83,0,0,1,47.22,37.71A8,8,0,0,1,250.14,206.7Z">
                        </path>
                    </svg>
                    Adoptions Module
                </a>
            </li>
            <li>
                <span class="inline-flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                        <path
                            d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm48-88a8,8,0,0,1-8,8H136v32a8,8,0,0,1-16,0V136H88a8,8,0,0,1,0-16h32V88a8,8,0,0,1,16,0v32h32A8,8,0,0,1,176,128Z">
                        </path>
                    </svg>
                    Show Adpotions
                </span>
            </li>
        </ul>
    </div>
    {{-- -Card --}}
      {{-- Card --}}
    <div class="bg-[#0009] p-10 rounded-sm">
        {{-- Photos --}}
        {{-- Photos --}}
        <div class="flex justify-center items-center gap-8 mb-8">
            {{-- User Photo --}}
            <div class="text-center">
                <div class="avatar">
                    <div class="mask mask-squircle w-40">
                        <img src="{{ asset('images/' . ($adopt->user?->photo ?? 'no-image.png')) }}"
                            alt="{{ $adopt->user?->fullname ?? 'Unknown' }}" />
                    </div>
                </div>
                <p class="text-white mt-2 font-semibold">{{ $adopt->user?->fullname ?? 'Unknown' }}</p>
                <p class="text-gray-400 text-sm">Adopter</p>
            </div>

            {{-- Heart Icon --}}
            <div class="text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                    viewBox="0 0 256 256">
                    <path
                        d="M178,40c-20.65,0-38.73,8.88-50,23.89C116.73,48.88,98.65,40,78,40a62.07,62.07,0,0,0-62,62c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,228.66,240,172,240,102A62.07,62.07,0,0,0,178,40ZM128,214.8C109.74,204.16,32,155.69,32,102A46.06,46.06,0,0,1,78,56c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,155.61,146.24,204.15,128,214.8Z">
                    </path>
                </svg>
            </div>

            {{-- Pet Photo --}}
            <div class="text-center">
                <div class="avatar">
                    <div class="mask mask-squircle w-40">
                        <img src="{{ asset('images/' . ($adopt->pet?->image ?? 'no-image.png')) }}"
                            alt="{{ $adopt->pet?->name ?? 'Unknown' }}" />
                    </div>
                </div>
                <p class="text-white mt-2 font-semibold">{{ $adopt->pet?->name ?? 'Unknown' }}</p>
                <p class="text-gray-400 text-sm">{{ $adopt->pet?->kind ?? 'Unknown' }}</p>
            </div>
        </div>

        {{-- Data --}}
        <div class="flex gap-4 flex-col md:flex-row">
            {{-- User Info --}}
            <div class="flex-1">
                <h3 class="text-white text-xl font-semibold mb-3 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 256 256">
                        <path
                            d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z">
                        </path>
                    </svg>
                    Adopter Information
                </h3>
                <ul class="list bg-[#0009] text-white rounded-box shadow-md">
                    <li class="list-row">
                        <span class="text-[#fff9] font-semibold">Full Name:</span>
                        <span>{{ $adopt->user?->fullname ?? 'N/A' }}</span>
                    </li>
                    <li class="list-row">
                        <span class="text-[#fff9] font-semibold">Email:</span> <span
                            class="text-[#fff9]">{{ $adopt->user?->email ?? 'N/A' }}</span>
                    </li>
                    <li class="list-row">
                        <span class="text-[#fff9] font-semibold">Phone:</span> <span
                            class="text-[#fff9]">{{ $adopt->user?->phone ?? 'N/A' }}</span>
                    </li>
                    <li class="list-row">
                        <span class="text-[#fff9] font-semibold">Document:</span> <span
                            class="text-[#fff9]">{{ $adopt->user?->document ?? 'N/A' }}</span>
                    </li>
                    <li class="list-row">
                        <span class="text-[#fff9] font-semibold">Adoption Date:</span>
                        <span>{{ $adopt->created_at->format('d/m/Y H:i') }}</span>
                    </li>
                    <li class="list-row">
                        <span class="text-[#fff9] font-semibold">Last Update:</span>
                        <span>{{ $adopt->updated_at->diffForHumans() }}</span>
                    </li>
                </ul>
            </div>
            {{-- Pet Info --}}
            <div class="flex-1">
                <h3 class="text-white text-xl font-semibold mb-3 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 256 256">
                        <path
                            d="M212,80a28,28,0,1,0,28,28A28,28,0,0,0,212,80Zm0,40a12,12,0,1,1,12-12A12,12,0,0,1,212,120ZM72,108a28,28,0,1,0-28,28A28,28,0,0,0,72,108ZM44,120a12,12,0,1,1,12-12A12,12,0,0,1,44,120ZM92,88A28,28,0,1,0,64,60,28,28,0,0,0,92,88Zm0-40A12,12,0,1,1,80,60,12,12,0,0,1,92,48Zm72,40a28,28,0,1,0-28-28A28,28,0,0,0,164,88Zm0-40a12,12,0,1,1-12,12A12,12,0,0,1,164,48Zm23.12,100.86a35.3,35.3,0,0,1-16.87-21.14,44,44,0,0,0-84.5,0A35.25,35.25,0,0,1,69,148.82,40,40,0,0,0,88,224a39.48,39.48,0,0,0,15.52-3.13,64.09,64.09,0,0,1,48.87,0,40,40,0,0,0,34.73-72ZM168,208a24,24,0,0,1-9.45-1.93,80.14,80.14,0,0,0-61.19,0,24,24,0,0,1-20.71-43.26,51.22,51.22,0,0,0,24.46-30.67,28,28,0,0,1,53.78,0,51.27,51.27,0,0,0,24.53,30.71A24,24,0,0,1,168,208Z">
                        </path>
                    </svg>
                    Pet Information
                </h3>
                <ul class="list bg-[#0009] text-white rounded-box shadow-md">
                    <li class="list-row">
                        <span class="text-[#fff9] font-semibold">Name:</span>
                        <span>{{ $adopt->pet?->name ?? 'N/A' }}</span>
                    </li>
                    <li class="list-row">
                        <span class="text-[#fff9] font-semibold">Kind:</span> <span
                            class="text-[#fff9]">{{ $adopt->pet?->kind ?? 'N/A' }}</span>
                    </li>
                    <li class="list-row">
                        <span class="text-[#fff9] font-semibold">Breed:</span> <span
                            class="text-[#fff9]">{{ $adopt->pet?->breed ?? 'N/A' }}</span>
                    </li>
                    <li class="list-row">
                        <span class="text-[#fff9] font-semibold">Age:</span> <span
                            class="text-[#fff9]">{{ $adopt->pet?->age ?? 'N/A' }} years</span>
                    </li>
                    <li class="list-row">
                        <span class="text-[#fff9] font-semibold">Weight:</span> <span
                            class="text-[#fff9]">{{ $adopt->pet?->weight ?? 'N/A' }} kg</span>
                    </li>
                    <li class="list-row">
                        <span class="text-[#fff9] font-semibold">Location:</span>
                        <span>{{ $adopt->pet?->location ?? 'N/A' }}</span>
                    </li>
                    <li class="list-row">
                        <span class="text-[#fff9] font-semibold">Description:</span> <span
                            class="text-[#fff9]">{{ $adopt->pet?->description ?? 'No description' }}</span>
                    </li>
                </ul>
            </div>

        </div>
    </div>
@endsection
@extends('layouts.dashboard')

@section('title', 'Show User: Larapets 🐶')
@section('content')

    <h1
        class="text-white mt-16 text-5xl font-extrabold tracking-wide flex gap-3 items-center justify-center pb-6 px-8 py-4
       bg-gradient-to-r  to-indigo-00/40 backdrop-blur-xl rounded-2xl shadow-2xl ">
        <svg xmlns="http://www.w3.org/2000/svg" class="items-center justify-center" width="34" height="34" fill="#fff"
            viewBox="0 0 256 256">
            <path
                d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z">
            </path>
        </svg>
        Show User
    </h1>

    <div class="breadcrumbs text-sm ">
        <ul>
            <li>
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-4 w-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="h-4 w-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                    </svg>
                    Users Module
                </a>
            </li>
            <li>
                <span class="inline-flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="h-4 w-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    Add User
                </span>
            </li>
        </ul>
    </div>
    {{-- Card --}}
    <div class="bg-[#0009] p-10 rounded-sm">
        <div
            class="avatar flex flex-col items-center justify-center gap-2 cursor-pointer hover:scale-110 transition ease-in">
            <div class="mask mask-squircle w-60">
                <img src="{{ asset('images/' . $user->photo) }}" />
            </div>
        </div>
        {{-- data --}}
        <div class="flex gap-2">    
            <ul class="list bg-[#0009] text-white mt-4 rounded-box shadow-md">
                <li class="list-row">
                    <span class="text-[#fff9]">Document: <span>{{ $user->document }}</span></span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9]">FullName: <span>{{ $user->fullname }}</span></span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9]">Gender: <span>{{ $user->gender }}</span></span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9]">Birthdate: <span>{{ $user->birthdate }}</span></span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9]">Phone: <span>{{ $user->phone }}</span></span>
                </li>
            </ul>
            <ul class="list bg-[#0009] text-white mt-4 rounded-box shadow-md">
                <li class="list-row">
                    <span class="text-[#fff9]">Email: <span>{{ $user->email }}</span></span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9]">Active: <span>{{ $user->active }}</span></span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9]">Role: <span>{{ $user->role }}</span></span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9]">Create At: <span>{{ $user->created_at }}</span></span>
                </li>
                <li class="list-row">
                    <span class="text-[#fff9]">Update At: <span>{{ $user->updated_at }}</span></span>
                </li>
            </ul>
        </div>
    </div>


@endsection

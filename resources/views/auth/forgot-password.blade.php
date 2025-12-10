{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('layouts.home')
@section('title', 'Forgot your password: Larapets 🐶')
@section('content')
    <section class="bg-[#0007] text-white rounded-lg w-5/12 p-8 flex flex-col gap-3 items-center justify-center" >
        <h1 class="flex gap-4 justify-center items-center text-4xl">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fff" viewBox="0 0 256 256">
                <path
                    d="M80,48A16,16,0,1,1,64,32,16,16,0,0,1,80,48Zm48-16a16,16,0,1,0,16,16A16,16,0,0,0,128,32Zm64,32a16,16,0,1,0-16-16A16,16,0,0,0,192,64ZM64,88a16,16,0,1,0,16,16A16,16,0,0,0,64,88Zm64,0a16,16,0,1,0,16,16A16,16,0,0,0,128,88Zm64,0a16,16,0,1,0,16,16A16,16,0,0,0,192,88ZM64,144a16,16,0,1,0,16,16A16,16,0,0,0,64,144Zm64,0a16,16,0,1,0,16,16A16,16,0,0,0,128,144Zm0,56a16,16,0,1,0,16,16A16,16,0,0,0,128,200Zm64-56a16,16,0,1,0,16,16A16,16,0,0,0,192,144Z">
                </path>
            </svg>
            Forgot your password?
        </h1>
        <div class="divider divider-neutral p-[0] m-[0]"></div>

        <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link
            that will allow you to choose a new one</p>
        <div class="card w-full max-w-sm ">
            <form method="POST" action="{{ route('password.email') }}" class="card-body mt-0">
                @csrf
                <label class="label ">Email</label>
                <input type="text" name="email" class="input bg-[#0006] w-full mt-1 outline-0" required
                    placeholder="Email" />
                @error('email')
                    <small class="badge badge-outline badge-error w-full mt-1">{{ $message }}</small>
                @enderror

                <button class="btn btn-outline hover:bg-[#fff6] hover:text-white mt-4">Submit</button>

                <p class="flex items-center justify-center gap-2 text-sm text-center mt-5">
                    <a class="link link-default flex items-center gap-1" href="{{ route('login') }}">
                        back
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#fff"
                            viewBox="0 0 256 256">
                            <path
                                d="M232,200a8,8,0,0,1-16,0,88.1,88.1,0,0,0-88-88H51.31l34.35,34.34a8,8,0,0,1-11.32,11.32l-48-48a8,8,0,0,1,0-11.32l48-48A8,8,0,0,1,85.66,61.66L51.31,96H128A104.11,104.11,0,0,1,232,200Z">
                            </path>
                        </svg>
                    </a>
                </p>
            </form>
        </div>
    </section>

@endsection

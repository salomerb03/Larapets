@extends('layouts.dashboard')
@section('title', 'Add User: Larapets')

@section('content')

    <h1
        class="text-white mt-16 text-5xl font-extrabold tracking-wide flex gap-3 items-center justify-center pb-6 px-8 py-4
       bg-gradient-to-r  to-indigo-00/40 backdrop-blur-xl rounded-2xl shadow-2xl ">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fff" viewBox="0 0 256 256">
            <path
                d="M104,40H56A16,16,0,0,0,40,56v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,104,40Zm0,64H56V56h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,200,40Zm0,64H152V56h48v48Zm-96,32H56a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,104,136Zm0,64H56V152h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,200,136Zm0,64H152V152h48v48Z">
            </path>
        </svg>
        Add Pet
    </h1>

    {{-- Breadcrumbs --}}

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
                    Pets Module
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
                    Add Pet
                </span>
            </li>
        </ul>
    </div>

    <div class="card w-full text-white ">
        <form method="POST" action="{{ route('pets.store') }}" class="flex flex-col gap-4 card-body"
            enctype="multipart/form-data">
            @csrf

            <div class="flex flex-col md:flex-row gap-4">
                <div class="w-full md:w-1/2">
                    {{-- Fhoto --}}
                    <div
                        class="avatar flex flex-col justify-center items-center cursor-pointer hover:scale-110 transition ease-in">
                        <div id="upload" class="mask mask-squircle w-28">
                            <img id="preview" src="{{ asset('images/no-image.png') }}" />
                        </div>

                        <small class="flex gap-2 mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="#fff" viewBox="0 0 256 256">
                                <path
                                    d="M168,136a8,8,0,0,1-8,8H136v24a8,8,0,0,1-16,0V144H96a8,8,0,0,1,0-16h24V104a8,8,0,0,1,16,0v24h24A8,8,0,0,1,168,136Zm64-56V192a24,24,0,0,1-24,24H48a24,24,0,0,1-24-24V80A24,24,0,0,1,48,56H75.72L87,39.12A16,16,0,0,1,100.28,32h55.44A16,16,0,0,1,169,39.12L180.28,56H208A24,24,0,0,1,232,80Zm-16,0a8,8,0,0,0-8-8H176a8,8,0,0,1-6.66-3.56L155.72,48H100.28L86.66,68.44A8,8,0,0,1,80,72H48a8,8,0,0,0-8,8V192a8,8,0,0,0,8,8H208a8,8,0,0,0,8-8Z">
                                </path>
                            </svg>
                            Upload Photo
                        </small>

                        {{-- ✔ input file obligatorio --}}
                        <input type="file" name="image" id="image" class="hidden" accept="image/*">

                        @error('image')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>


                    {{-- Name --}}

                    <label class="label">Name</label>
                    <input type="text" class="input bg-[#0006] w-full mt-1 outline-0" name="name"
                        placeholder="Firulais" value="{{ old('name') }}" />
                    @error('name')
                        <small class="badge badge-neutral w-full mt-1 text-xs py-4">{{ $message }}</small>
                    @enderror

                    {{-- Kind --}}

                    <div>
                        <label class="label">Kind</label>
                        <select name="kind" class="select bg-[#0009] w-full outline-0">
                            <option value="">Select...</option>
                            <option value="Dog" @selected(old('kind') == 'Dog')>Dog</option>
                            <option value="Cat" @selected(old('kind') == 'Cat')>Cat</option>
                            <option value="Bird" @selected(old('kind') == 'Bird')>Bird</option>
                            <option value="Pig" @selected(old('kind') == 'Pig')>Pig</option>
                        </select>
                        @error('kind')
                            <small class="badge badge-neutral w-full mt-1 text-xs py-4">{{ $message }}</small>
                        @enderror
                    </div>


                    {{-- Weight --}}
                    <label class="label">Weight</label>
                    <input type="number" class="input bg-[#0006] w-full mt-1 outline-0" name="weight" placeholder="7.3"
                        value="{{ old('weight') }}" />
                    @error('weight')
                        <small class="badge badge-neutral w-full mt-1 text-xs py-4">{{ $message }}</small>
                    @enderror

                </div>

                <div class="w-full md:w-1/2">
                    {{-- Age --}}
                    <label class="label">Age</label>
                    <input type="number" class="input bg-[#0006] w-full mt-1 outline-0" name="age"
                        placeholder="3,6,8..." value="{{ old('age') }}" />
                    @error('age')
                        <small class="badge badge-neutral w-full mt-1 text-xs py-4">{{ $message }}</small>
                    @enderror

                    {{-- Breed --}}
                    <label class="label">Breed</label>
                    <input type="text" class="input bg-[#0006] w-full mt-1 outline-0" name="breed"
                        placeholder="Cocker, mestizo, etc..." value="{{ old('breed') }}" />
                    @error('breed')
                        <small class="badge badge-neutral w-full mt-1 text-xs py-4">{{ $message }}</small>
                    @enderror

                    {{-- location --}}
                    <label class="label">Location</label>
                    <input type="text" class="input bg-[#0006] w-full mt-1 outline-0" name="location"
                        placeholder="Manizales, pereira, Medellin..." value="{{ old('location') }}" />
                    @error('location')
                        <small class="badge badge-neutral w-full mt-1 text-xs py-4">{{ $message }}</small>
                    @enderror

                    {{-- Description --}}
                    <label class="label">Description</label>
                    <textarea class="textarea bg-[#0006] w-full mt-1 outline-0" name="description" rows="4"
                        placeholder="Describe al animal...">{{ old('description') }}</textarea>

                    @error('description')
                        <small class="badge badge-neutral w-full mt-1 text-xl py-4">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Botón debajo de las dos columnas -->
            <button class="btn btn-outline bg-yellow-600 hover:bg-[#ffd0009d] hover:text-white mt-4">Add</button>
        </form>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function() {

            // cuando se hace clic en el avatar, abrir input file
            $('#upload').click(function() {
                $('#image').click();
            });

            // mostrar la previsualización
            $('#image').change(function() {
                const file = this.files[0];
                if (file) {
                    $('#preview').attr('src', URL.createObjectURL(file));
                }
            });

        });
    </script>
@endsection

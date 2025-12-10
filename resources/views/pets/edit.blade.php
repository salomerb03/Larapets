@extends('layouts.dashboard')
@section('title', 'Edit Pet - Larapets')

@section('content')

    <h1
        class="text-white mt-16 text-5xl font-extrabold tracking-wide flex gap-3 items-center justify-center pb-6 px-8 py-4
    bg-gradient-to-r  to-indigo-00/40 backdrop-blur-xl rounded-2xl shadow-2xl ">

        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fff" viewBox="0 0 256 256">
            <path
                d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM51.31,160,136,75.31,152.69,92,68,176.68ZM48,179.31,76.69,208H48Zm48,25.38L79.31,188,164,103.31,180.69,120Zm96-96L147.31,64l24-24L216,84.68Z">
            </path>
        </svg>

        Edit Pet
    </h1>

    {{-- Breadcrumbs --}}
    <div class="breadcrumbs text-sm">
        <ul>
            <li><a>Dashboard</a></li>
            <li><a>Pets Module</a></li>
            <li><span>Edit Pet</span></li>
        </ul>
    </div>

    <div class="card w-full max-w-3xl mx-auto text-white mt-6">
        <form method="POST" action="{{ url('pets/' . $pet->id) }}" class="flex flex-col gap-6 card-body"
            enctype="multipart/form-data">

            @if ($errors->any())
                <div class="alert alert-error p-4 mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @csrf
            @method('PUT')

            {{-- FOTO --}}
            <div class="flex flex-col items-center">
                <div class="avatar cursor-pointer hover:scale-110 transition">
                    <div id="upload" class="mask mask-squircle w-32 h-32">
                        <img id="preview" src="{{ asset('images/' . $pet->image) }}" />
                    </div>
                </div>

                <small class="flex items-center gap-2 mt-2 cursor-pointer text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="#fff" viewBox="0 0 256 256">
                        <path
                            d="M168,136a8,8,0,0,1-8,8H136v24a8,8,0,0,1-16,0V144H96a8,8,0,0,1,0-16h24V104a8,8,0,0,1,16,0v24h24A8,8,0,0,1,168,136Z">
                        </path>
                    </svg>
                    Change Photo
                </small>

                {{-- INPUT REAL --}}
                <input type="file" id="image" name="image" class="hidden" accept="image/*">

                {{-- IMAGEN ORIGINAL --}}
                <input type="hidden" name="originalimage" value="{{ $pet->image }}">
            </div>

            {{-- CAMPOS --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="space-y-4">
                    <div>
                        <label class="label">Name</label>
                        <input type="text" class="input bg-[#0006] w-full mt-1 outline-0" name="name"
                            value="{{ old('name', $pet->name) }}">
                    </div>

                    <div>
                        <label class="label">Kind</label>
                        <select name="kind" class="select bg-[#0009] w-full outline-0">
                            <option value="">Select...</option>
                            <option value="Dog" @selected($pet->kind == 'Dog')>Dog</option>
                            <option value="Cat" @selected($pet->kind == 'Cat')>Cat</option>
                            <option value="Bird" @selected($pet->kind == 'Bird')>Bird</option>
                            <option value="Pig" @selected($pet->kind == 'Pig')>Pig</option>
                        </select>
                    </div>

                    <div>
                        <label class="label">Breed</label>
                        <input type="text" class="input bg-[#0006] w-full mt-1 outline-0" name="breed"
                            value="{{ old('breed', $pet->breed) }}">
                    </div>

                    <div>
                        <label class="label">Weight</label>
                        <input type="text" class="input bg-[#0006] w-full mt-1 outline-0" name="weight"
                            value="{{ old('weight', $pet->weight) }}">
                    </div>

                    <div>
                        <label class="label">Location</label>
                        <input type="text" name="location" class="input bg-[#0009] w-full" value="{{ $pet->location }}">
                    </div>

                </div>

                <div class="space-y-4">
                    <div>
                        <label class="label">Age</label>
                        <input type="number" class="input bg-[#0006] w-full mt-1 outline-0" name="age"
                            value="{{ old('age', $pet->age) }}">
                    </div>

                    <div>
                        <label class="label">Active</label>
                        <select name="active" class="select bg-[#0009] w-full outline-0">
                            <option value="1" @selected($pet->active == 1)>Active</option>
                            <option value="0" @selected($pet->active == 0)>Inactive</option>
                        </select>
                    </div>

                    <div>
                        <label class="label">Description</label>
                        <textarea name="description" class="textarea bg-[#0006] w-full h-50 outline-0">{{ old('description', $pet->description) }}</textarea>
                    </div>
                </div>

            </div>

            {{-- BOTÓN --}}
            <button class="btn btn-outline bg-yellow-600 hover:bg-yellow-500 mt-4">
                Update Pet
            </button>

        </form>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function() {

            $('#upload').click(function(e) {
                e.preventDefault();
                $('#image').click();
            });

            $('#image').change(function(e) {
                $('#preview').attr('src',
                    window.URL.createObjectURL($(this).prop('files')[0])
                );
            });

        });
    </script>
@endsection

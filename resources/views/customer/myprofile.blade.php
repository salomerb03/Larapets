@extends('layouts.dashboard')
@section('title', 'Edit My Profile: Larapets')

@section('content')

<h1 class="text-white mt-16 text-5xl font-extrabold tracking-wide flex gap-3 items-center justify-center pb-6 px-8 py-4
   bg-gradient-to-r  to-indigo-00/40 backdrop-blur-xl rounded-2xl shadow-2xl ">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fff" viewBox="0 0 256 256">
        <path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM51.31,160,136,75.31,152.69,92,68,176.68ZM48,179.31,76.69,208H48Zm48,25.38L79.31,188,164,103.31,180.69,120Zm96-96L147.31,64l24-24L216,84.68Z"></path>
    </svg>
    Edit My Profile
</h1>

{{-- Mostrar errores de validación --}}
@if ($errors->any())
    <div class="alert alert-error text-white p-3 rounded-lg mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card w-full max-w-3xl mx-auto text-white">
<form method="POST" action="{{ route('myprofile.update', $user->id) }}" 
      class="flex flex-col gap-6 card-body"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- FOTO ARRIBA -->
    <div class="flex flex-col items-center">
        <div class="avatar cursor-pointer hover:scale-110 transition" id="upload">
            <div class="mask mask-squircle w-32 h-32">
                <img id="preview" src="{{ asset('images/'.$user->photo) }}" />
            </div>
        </div>

        <small class="flex items-center gap-2 mt-2 cursor-pointer text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="#fff" viewBox="0 0 256 256">
                <path d="M168,136a8,8,0,0,1-8,8H136v24a8,8,0,0,1-16,0V144H96a8,8,0,0,1,0-16h24V104a8,8,0,0,1,16,0v24h24A8,8,0,0,1,168,136Zm64-56V192a24,24,0,0,1-24,24H48a24,24,0,0,1-24-24V80A24,24,0,0,1,48,56H75.72L87,39.12A16,16,0,0,1,100.28,32h55.44A16,16,0,0,1,169,39.12L180.28,56H208A24,24,0,0,1,232,80Zm-16,0a8,8,0,0,0-8-8H176a8,8,0,0,1-6.66-3.56L155.72,48H100.28L86.66,68.44A8,8,0,0,1,80,72H48a8,8,0,0,0-8,8V192a8,8,0,0,0,8,8H208a8,8,0,0,0,8-8Z"></path>
            </svg>
            Upload Photo
        </small>

        <input type="file" id="photo" name="photo" class="hidden" accept="image/*">
        <input type="hidden" name="originalphoto" value="{{ $user->photo }}">
    </div>

    <!-- CAMPOS ABAJO EN DOS COLUMNAS -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div class="space-y-4">
            <div>
                <label class="label">Document</label>
                <input type="text" class="input bg-[#0006] w-full mt-1 outline-0"
                       name="document" value="{{ old('document', $user->document) }}" />
            </div>

            <div>
                <label class="label">Full Name</label>
                <input type="text" class="input bg-[#0006] w-full mt-1 outline-0"
                       name="fullname" value="{{ old('fullname', $user->fullname) }}" />
            </div>

            <div>
                <label class="label">Gender</label>
                <select name="gender" class="select bg-[#0009] w-full outline-0">
                    <option value="">Select...</option>
                    <option value="Male" @if(old('gender', $user->gender) == 'Male') selected @endif>Male</option>
                    <option value="Female" @if(old('gender', $user->gender) == 'Female') selected @endif>Female</option>
                </select>
            </div>
        </div>

        <div class="space-y-4">
            <div>
                <label class="label">Phone</label>
                <input type="text" class="input bg-[#0006] w-full mt-1 outline-0"
                       name="phone" value="{{ old('phone', $user->phone) }}" />
            </div>

            <div>
                <label class="label">Email</label>
                <input type="text" class="input bg-[#0006] w-full mt-1 outline-0"
                       name="email" value="{{ old('email', $user->email) }}" required />
            </div>

            <div>
                <label class="label">Birthdate</label>
                <input type="date" class="input bg-[#0006] w-full mt-1 outline-0"
                       name="birthdate" value="{{ old('birthdate', $user->birthdate) }}" />
            </div>
        </div>

    </div>

    <!-- Botón -->
    <button class="btn btn-outline bg-yellow-600 hover:bg-yellow-500 mt-4">
        Edit
    </button>

</form>
</div>

@endsection

@section('js')
<script>
$(document).ready(function() {
    $('#upload').click(function(e) {
        e.preventDefault()
        $('#photo').click()
    })
    $('#photo').change(function(e) {
        e.preventDefault()
        $('#preview').attr('src', window.URL.createObjectURL($(this).prop('files')[0]))
    })
})
</script>
@endsection

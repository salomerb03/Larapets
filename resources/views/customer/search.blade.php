@foreach ($pets as $pet)
    <tr @if ($pet->id % 2 == 0) class="bg-[#0006]" @endif>
        <th class="hidden md:table-cell">{{ $pet->id }}</th>
        <td>
            <div class="avatar">
                <div class="mask mask-squircle w-12">
                    <img src="{{ asset($pet->image ? 'images/' . $pet->image : 'images/no-image.png') }}" />x|
                </div>
            </div>
        </td>
        <td>{{ $pet->name }}</td>
        <td>
            @if ($pet->kind == 'Dog')
                <span class="badge bg-blue-500 text-white px-2 py-1 rounded">Dog</span>
            @elseif ($pet->kind == 'Cat')
                <span class="badge bg-purple-500 text-white px-2 py-1 rounded">Cat</span>
            @elseif ($pet->kind == 'Bird')
                <span class="badge bg-green-500 text-white px-2 py-1 rounded">Bird</span>
            @elseif ($pet->kind == 'Pig')
                <span class="badge bg-yellow-500 text-white px-2 py-1 rounded">Pig</span>
            @else
                <span class="badge bg-gray-500 text-white px-2 py-1 rounded">Otro</span>
            @endif
        </td>

        <td class="hidden md:table-cell">
            {{ $pet->breed }}
        </td>

        <td>
            @if ($pet->status == 1)
                <div class="badge badge-accent">Adopted</div>
            @else
                <div class="badge badge-error">Available</div>
            @endif
        </td>
        <td>
            <a class="btn btn-xs btn-outline" href="{{ url('makeadoption/' . $pet->id) }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="#fff" viewBox="0 0 256 256">
                    <path
                        d="M223,57a58.07,58.07,0,0,0-81.92-.1L128,69.05,114.91,56.86A58,58,0,0,0,33,139l89.35,90.66a8,8,0,0,0,11.4,0L223,139a58,58,0,0,0,0-82Zm-11.35,70.76L128,212.6,44.3,127.68a42,42,0,0,1,59.4-59.4l.2.2,18.65,17.35a8,8,0,0,0,10.9,0L152.1,68.48l.2-.2a42,42,0,1,1,59.36,59.44Z">
                    </path>
                </svg>
            </a>
        </td>
    </tr>
@endforeach
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Pets</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 6px; font-size: 12px; }
        th { background: #f4f4f4; }
    </style>
</head>
<body>
    <h2>All adoptions</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Id user</th>
                <th>Id pet</th>
                <th>Breed</th>
                <th>Age</th>
                <th>Weight</th>
                <th>Location</th>
                <th>Description</th>
                <th>Active</th>
                <th>Status</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($adopts as $adopt)
            <tr>
                <td>{{ $adopt->id }}</td>
                <td>{{ $adopt->id_user }}</td>
                <td>{{ $adopt->id_pet }}</td>
                <td>{{ $adopt->created_at }}</td>
                <td>{{ $adopt->update_at }}</td>  
                <td><img src="{{ public_path('images/'.$pet->image) }}" width="50" height="50" /></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
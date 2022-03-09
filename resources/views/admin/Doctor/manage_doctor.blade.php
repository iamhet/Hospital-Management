<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">

        @include('admin.navbar')
        @include('admin.sidebar')


        <div class="main-panel">

            <table class="table table-dark" style="color: rgb(147, 147, 155);">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Speciality</th>
                        <th scope="col">Image</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctors->chunk(2) as $items)
                        @foreach ($items as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->speciality }}</td>
                                <td><img src="doctor/{{ $item->image }}" style="width: 80px; height: 80px;" /></td>
                                <td><a href="{{ route('doctor.edit', $item->id) }}" class="btn btn-primary">Update</a>
                                </td>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['news.destroy', $item->id], 'style' => 'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
        @include('admin.script')
</body>

</html>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        @include('admin.css')
        @include('admin.script')
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
                                <td><a href="{{ route('doctor.edit', $item->id) }}" class="btn btn-primary">Update</a></td>
                                {{-- <td><button class="btn btn-primary" id="update_doctor" data-id={{$item->id}}>Update</button></td> --}}
                                <td>                                
                                {!! Form::open(['method' => 'DELETE', 'route' => ['doctor.destroy', $item->id], 'style' => 'display:inline','id'=>'delete_doctor_frm']) !!}
                                {!! Form::submit('Delete', ['type'=>'submit','class' => 'btn btn-danger  delete_doctor_btn']) !!}
                                {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

        {{-- <script>
            $(document).ready(function () {
                $(document).on('submit','#delete_doctor_frm', function (e) {
                    e.preventDefault();
                    // alert();
                    var action = $(this).attr('action');
                    $.ajax({
                        type: "delete",
                        url: action,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType:'json'
                    }).done(function(){
                        alert('doctor delete ho bhai.');
                    });
                });
                
            });
        </script> --}}
        
</body>

</html>

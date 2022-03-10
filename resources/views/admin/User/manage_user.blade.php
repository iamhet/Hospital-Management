<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">

        @include('admin.navbar')
        @include('admin.sidebar')

        <div class="main-panel" style="margin-top: 1%">
            <table class="table table-dark" style="color: rgb(147, 147, 155);">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->chunk(2) as $items)
                        @foreach ($items as $item)

                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                @if (!empty($item->getRoleNames()))
                                    <label>{{ $item->getRoleNames() }}</label>
                                @endif
                            </td>
                            <td><a href="{{ route('users.edit', $item->id) }}" >
                                <button type="submit" class="btn btn-primary">Update</button>
                            </a>
                               
                            </td>
                            <td>
                                <form action="{{route('users.destroy',$item->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                  </form>
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

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
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($role as $item)
            <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->name}}</td>
              <td><a href="{{route('roles.edit',$item->id)}}" class="btn btn-primary">Update</a>
                <a href="{{url('roles_destroy',$item->id)}}" class="btn btn-danger">Delete</a></td>
          </tr>
          @endforeach 
          </tbody>
      </table>
    </div>
    @include('admin.script')
  </body>
</html>
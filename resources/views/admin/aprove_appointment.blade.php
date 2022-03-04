<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      
    @include('admin.sidebar')
    @include('admin.navbar')

        <div class="container " style="margin-top: 7%; scrollbar-width: auto;">
        <table class="table table-dark" style="color: rgb(147, 147, 155);">
          <thead>
            <tr>
              <th scope="col">User_Id</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Number</th>
              <th scope="col">Message</th>
              <th scope="col">Date</th>
              <th scope="col">Speciality</th>
              <th scope="col">Status</th>
              <th scope="col">Approve</th>
              <th scope="col">Cancle</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $item)
            <tr>
              <th scope="row">{{$item->user_id}}</th>
              <td>{{$item->name}}</td>
              <td>{{$item->email}}</td>
              <td>{{$item->number}}</td>
              <td>{{$item->message}}</td>
              <td>{{$item->date}}</td>
              <td>{{$item->speciality}}</td>
              <td>{{$item->status}}</td>
              <td><a href="{{url('approve',$item->id)}}" class="btn btn-success">Approve</a></td>
              <td><a href="{{url('cancle',$item->id)}}" class="btn btn-danger">Cancle</a></td>
          </tr>
          @endforeach 
          </tbody>
      </table>
    </div>
    @include('admin.script')
  </body>
</html>
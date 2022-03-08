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
              <th scope="col">Title</th>
              <th scope="col">Writer</th>
              <th scope="col">Writer Image</th>
              <th scope="col">Image</th>
              <th scope="col">Update</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($news->chunk(2) as $items)
              @foreach ($items as $item)
              <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->topic}}</td>
                <td>{{$item->writer}}</td>
                <td><img src="writer_image/{{$item->writer_image}}" style="width: 80px; height: 80px;"/></td>
                <td><img src="news_image/{{$item->image}}" style="width: 80px; height: 80px;"/></td>
                <td><a href="{{route('news.edit',$item->id)}}" class="btn btn-primary">Update</a></td>
                <td><a href="{{url('doctor.destroy',$item->id)}}" class="btn btn-danger">Delete</a></td>
              
            </tr>       
              @endforeach
          @endforeach 
          </tbody>
      </table>
    </div>
    @include('admin.script')
  </body>
</html>
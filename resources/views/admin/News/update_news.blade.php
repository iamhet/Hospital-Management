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
      @if (session()->has('message'))
        <div class="alert alert-success">
          {{session()->get('message')}}  
          <button type="button" class="close" data-dismiss='alert'>X</button>
        </div>        
      @endif
        <h1 class="mt-5 display-2">UPDATE NEWS</h1>
        {!! Form::open(['route'=>['news.update',$news->id] ,'method' => 'PATCH', 'files'=>true ]) !!}
        @csrf
            <div class="mt-5 pt-3 w-50 ">
                    <div class="form-outline mb-4 form-outline form-white">
                        <label class="form-label" for="form2Example1">News Title :</label>
                        {!! Form::text('topic', $news->topic, ['placeholder' => 'Enter News Title', 'class' => 'form-control text-dark ']) !!}
                    </div>
                  
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example2">Writer Name :</label>
                        {!! Form::text('writer', $news->writer, ['placeholder' => 'Enter Phone', 'class' => 'form-control text-dark']) !!}

                    </div>
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example2">Writer Name :</label>
                      {!!Form::textarea('Description', $news->Description, [
                        'class'      => 'form-control',
                        'rows'       => 6, 
                        'placeholder'=> 'Enter Message',
                        'name'       => 'message',
                        'id'         => 'message',
                    ])!!}
                  </div>
                    
                    <div class="form-outline mb-4 ">
                        <label class="form-label" for="form2Example1"> Writer Image :</label><br>
                        <img src="{{url('/writer_image/',$news->writer_image)}}" style="width: 80px; height: 80px;"/>
                        {!!Form::file('writer_image',['class' => 'form-control text-dark'])!!}
                    </div>
                    <div class="form-outline mb-4 ">
                        <label class="form-label" for="form2Example1"> News Image :</label><br>
                        <img src="{{url('/news_image/',$news->image)}}" style="width: 80px; height: 80px;"/>
                        {!!Form::file('image',['class' => 'form-control text-dark'])!!}
                    </div>
                    {!! Form::submit('UPDATE', ['class' => 'btn btn-primary btn-block mb-4']) !!}
            </div>
        {!! Form::close() !!}

    </div>
    @include('admin.script')
  </body>
</html>
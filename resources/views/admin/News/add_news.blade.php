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
        <h1 class="mt-5 display-2">ADD NEWS</h1>
        {!! Form::open(['route'=>'news.store' ,'method' => 'POST', 'files'=>true ]) !!}
        @csrf
            <div class="mt-5 pt-3 w-50 " style="color: white">
                    <div class="form-outline mb-4 form-outline form-white">
                        <label class="form-label" for="form2Example1">News Title :</label>
                        {!! Form::text('topic', null, ['placeholder' => 'Enter Doctor Name', 'class' => 'form-control text-dark ']) !!}
                    </div>
                  
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example2">Writer Name :</label>
                        {!! Form::text('writer', null, ['placeholder' => 'Enter Phone', 'class' => 'form-control text-dark']) !!}

                    </div>
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example2">Description :</label>
                      {!!Form::textarea('Description', null, [
                        'class'      => 'form-control',
                        'rows'       => 6, 
                        'placeholder'=> 'Enter Message',
                        'name'       => 'message',
                        'id'         => 'message',
                    ])!!}

                  </div>
                    
                    <div class="form-outline mb-4 ">
                        <label class="form-label" for="form2Example1">Writer Image :</label><br>
                        {!!Form::file('writer_image',['class' => 'form-control text-dark'])!!}
                    </div>
                    <div class="form-outline mb-4 ">
                        <label class="form-label" for="form2Example1">Image :</label><br>
                        {!!Form::file('image',['class' => 'form-control text-dark'])!!}
                    </div>
                    
                    {!! Form::submit('ADD', ['class' => 'btn btn-primary btn-block mb-4']) !!}
           
            </div>
        {!! Form::close() !!}

    </div>
    @include('admin.script')
  </body>
</html>
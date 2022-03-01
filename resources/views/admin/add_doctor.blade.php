<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      
    @include('admin.sidebar')
    @include('admin.navbar')

    <div class="container-fluid page-body-wrapper">
    <div class="container">
        <h1 class="mt-5 display-2">ADD STUDENT</h1>
        {!! Form::open(['url'=>'store' ,'method' => 'POST', 'enctype'=>'multipart/form']) !!}
        @csrf
            <div class="mt-5 pt-3 w-50">
                <form>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example1">Doctor Name :</label>
                        {!! Form::text('name', null, ['placeholder' => 'Enter Doctor Name', 'class' => 'form-control']) !!}
                    </div>
                  
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example2">Phone :</label>
                        {!! Form::text('phone', null, ['placeholder' => 'Enter Phone', 'class' => 'form-control']) !!}

                    </div>
                    <div class="form-outline mb-4 text-dark">
                        <label class="form-label text-light" for="form2Example1">Speciality :</label><br>
                        {!!Form::select('size', ['s' => 'Skin', 'h' => 'Heart', 'e' => 'Eye', 'n'=> 'Nose'], null, ['placeholder' => 'Select Speciality'])!!}
                    </div>
                    <div class="form-outline mb-4 ">
                        <label class="form-label" for="form2Example1">Doctor Image :</label><br>
                        {!!Form::file('image',['class' => 'form-control'])!!}
                    </div>
                    {!! Form::submit('ADD', ['class' => 'btn btn-primary btn-block mb-4']) !!}
                  </form>
            </div>
        {!! Form::close() !!}

    </div>
    </div>
    @include('admin.script')
  </body>
</html>
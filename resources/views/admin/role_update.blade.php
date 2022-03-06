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
        <h1 class="mt-5 display-2">ADD DOCTOR</h1>
        {!! Form::open(['url'=>['roles_update',$role->id] ,'method' => 'POST' ]) !!}
        @csrf
            <div class="mt-5 pt-3 w-50 ">
                    <div class="form-outline mb-4 form-outline form-white">
                        <label class="form-label" for="form2Example1"> Name :</label>
                        {!! Form::text('name', $role->name, ['placeholder' => 'Enter Doctor Name', 'class' => 'form-control text-dark ']) !!}
                    </div>
                  
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example2">Permission :</label><br/>
                        @foreach ($permission as $value)
                        <label> {{ Form::checkbox('permission[]', $value->id, in_array($value->id,$rolePermission)? true : false) }} {{ $value->name }}</label>
                            {{ $value->name }}</label>
                        <br />
                    @endforeach
                    </div>
                    
                    {!! Form::submit('UPDATE', ['class' => 'btn btn-primary btn-block mb-4']) !!}
            </div>
        {!! Form::close() !!}

    </div>
    @include('admin.script')
  </body>
</html>
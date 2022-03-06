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
        <h1 class="mt-5 display-2">ADD ROLES</h1>
        {!! Form::open(['route'=>'roles.store' ,'method' => 'POST', 'files'=>true ]) !!}
        @csrf
            <div class="mt-5 pt-3 w-50 ">
                <form>
                    <div class="form-outline mb-4 form-outline form-white">
                        <label class="form-label" for="form2Example1">Role Name :</label>
                        {!! Form::text('name', null, ['placeholder' => 'Enter Doctor Name', 'class' => 'form-control text-dark ']) !!}
                    </div>
                  
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example2">Permission :</label><br/>
                        @foreach ($permission as $value)
                        {{ Form::checkbox('permission[]', $value->id, false) }} {{ $value->name }}
                        <br/>
                         @endforeach

                    </div>
                    
                    {!! Form::submit('ADD ROLE', ['class' => 'btn btn-primary btn-block mb-4']) !!}
                  </form>
            </div>
        {!! Form::close() !!}

    </div>
    @include('admin.script')
  </body>
</html>
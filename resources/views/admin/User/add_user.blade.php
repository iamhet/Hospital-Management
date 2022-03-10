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
                    {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss='alert'>X</button>
                </div>
            @endif
            <h1 class="mt-5 display-2">ADD USER</h1>
            {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
            @csrf
            <div class="mt-5 pt-3 w-50 ">
                <form>
                    <div class="form-outline mb-4 form-outline form-white">
                        <label for="exampleInputName" class="form-label">Name :-</label>
                        {!! Form::text('name', null, ['placeholder' => 'Enter Name', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-outline mb-4">
                        <label for="exampleInputEmail" class="form-label">Phone :-</label>
                        {!! Form::text('phone', null, ['placeholder' => 'Enter Phone', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-outline mb-4">
                        <label for="exampleInputEmail" class="form-label">Address :-</label>
                        {!! Form::text('address', null, ['placeholder' => 'Enter Address', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-outline mb-4 ">
                        <label class="form-label text-light" for="form2Example1">User Type :</label><br>
                        {!!Form::select('usertype', ['admin' => 'admin', 'user' => 'user'], null, ['placeholder' => 'Select UserType', 'class'=>'text-dark'])!!}
                    </div>
                    <div class="form-outline mb-4">
                        <label for="exampleInputEmail" class="form-label">Email :-</label>
                        {!! Form::text('email', null, ['placeholder' => 'Enter Email', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-outline mb-4">
                        <label for="exampleInputPassword1" class="form-label">Password :-</label>
                        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-outline mb-4">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password :-</label>
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                      </div>
                      <div class="form-outline mb-4">
                        <label for="exampleInputPassword1" class="form-label">Role :-</label>
                        {!! Form::select('role[]', $role,[], array('class' => 'form-control','multiple')) !!}
                      </div>
                    {!! Form::submit('ADD USER', ['class' => 'btn btn-primary btn-block mb-4']) !!}
                </form>
            </div>
            {!! Form::close() !!}

        </div>
        @include('admin.script')
</body>

</html>

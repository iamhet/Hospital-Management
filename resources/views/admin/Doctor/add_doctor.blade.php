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
        {!! Form::open(['url'=>'doctor_store' ,'method' => 'POST', 'files'=>true ]) !!}
        @csrf
            <div class="mt-5 pt-3 w-50 " style="color: white">
                    <div class="form-outline mb-4 form-outline form-white">
                        <label class="form-label" for="form2Example1">Doctor Name :</label>
                        {!! Form::text('name', null, ['placeholder' => 'Enter Doctor Name', 'class' => 'form-control text-dark ']) !!}
                    </div>
                  
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example2">Phone :</label>
                        {!! Form::text('phone', null, ['placeholder' => 'Enter Phone', 'class' => 'form-control text-dark']) !!}

                    </div>
                    <div class="form-outline mb-4 text-dark">
                        <label class="form-label text-light" for="form2Example1">Speciality :</label><br>
                        {!!Form::select('speciality', ['Skin' => 'Skin', 'Heart' => 'Heart', 'Eye' => 'Eye', 'Nose'=> 'Nose'], null, ['placeholder' => 'Select Speciality', 'class'=>'text-dark'])!!}
                    </div>
                    <div class="form-outline mb-4 ">
                        <label class="form-label" for="form2Example1">Doctor Image :</label><br>
                        {!!Form::file('image',['class' => 'form-control text-dark', 'id' => 'image'])!!}

                        <img id="preview-image" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                      alt="preview image" style="max-height: 250px;">
                    </div>
                    {!! Form::submit('ADD', ['class' => 'btn btn-primary btn-block mb-4']) !!}
           
            </div>
        {!! Form::close() !!}

    </div>
    @include('admin.script')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function (e) {
        $('#image').change(function(){
          let reader = new FileReader();
          reader.onload = (e) => { 
            $('#preview-image').attr('src', e.target.result); 
          }
          reader.readAsDataURL(this.files[0]); 
        }); 
      });
    </script>
  </body>
</html>
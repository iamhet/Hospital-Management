<div class="page-section">
    <div class="container">
      
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

        {!! Form::open(['url'=>'create_appointment' ,'method' => 'POST', 'files'=>true, 'class' => 'main-form' ]) !!}
        @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            {!! Form::text('name', null, ['placeholder' => 'Enter Name', 'class' => 'form-control text-dark']) !!}
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            {!! Form::text('email', null, ['placeholder' => 'Enter Email', 'class' => 'form-control text-dark']) !!}
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            {!!Form::select('speciality', $items, null, ['class'=>'form-control, custom-select'])!!}
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            {!! Form::text('number', null, ['placeholder' => 'Enter Number', 'class' => 'form-control text-dark']) !!}
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            {!!Form::textarea('message', null, [
                    'class'      => 'form-control',
                    'rows'       => 6, 
                    'placeholder'=> 'Enter Message',
                    'name'       => 'message',
                    'id'         => 'message',
                ])!!}
          </div>
        </div>
        {!! Form::submit('submit', ['class' => 'btn btn-primary mt-3 wow zoomIn']) !!}
      </form>
    </div>
  </div>
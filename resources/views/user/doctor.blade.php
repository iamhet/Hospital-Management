<div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>
      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
      @foreach ($doctor->chunk(2) as $doctorss)
        @foreach ($doctorss as $doctors)
          
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img height="300px" width="300px" src="doctor/{{$doctors->image}}" alt="">
              <div class="meta">
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">{{$doctors->name}}</p>
              <span class="text-sm text-grey">speciality: {{$doctors->speciality}}</span>
            </div>
          </div>
        </div>
        @endforeach
        @endforeach
      </div>

    </div>
  </div>
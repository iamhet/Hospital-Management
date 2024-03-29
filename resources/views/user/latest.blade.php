<div class="page-section bg-light">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Latest News</h1>
      <div class="row mt-5">

        @foreach ($news->chunk(2) as $items)
        @foreach ($items as $item)
        <div class="col-lg-4 py-2 wow zoomIn">
          <div class="card-blog">
            <div class="header">
              <div class="post-category">
                <a href="#">Covid19</a>
              </div>
              <a href="{{url('news_open',$item->id)}}" class="post-thumb">
                <img src="news_image/{{$item->image}}" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="{{url('news_open',$item->id)}}">{{$item->topic}}</a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                  <div class="avatar-img">
                    <img src="writer_image/{{$item->writer_image}}" alt="">
                  </div>
                  <span>{{$item->writer}}</span>
                </div>
                <span class="mai-time"></span> 1 week ago
              </div>
            </div>
          </div>
        </div>
        
        @endforeach
        @endforeach
        <div class="col-12 text-center mt-4 wow zoomIn">
          <a href="{{url('newsdetail')}}" class="btn btn-primary">Read More</a>
        </div>

      </div>
    </div>
  </div> 
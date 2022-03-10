<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>One Health - Medical Center HTML5 Template</title>

    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../assets/css/theme.css">
</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 text-sm">
                        <div class="site-info">
                            <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
                            <span class="divider">|</span>
                            <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
                        </div>
                    </div>
                    <div class="col-sm-4 text-right text-sm">
                        <div class="social-mini-button">
                            <a href="#"><span class="mai-logo-facebook-f"></span></a>
                            <a href="#"><span class="mai-logo-twitter"></span></a>
                            <a href="#"><span class="mai-logo-dribbble"></span></a>
                            <a href="#"><span class="mai-logo-instagram"></span></a>
                        </div>
                    </div>
                </div> <!-- .row -->
            </div> <!-- .container -->
        </div> <!-- .topbar -->

        <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a>

                <form action="#">
                    <div class="input-group input-navbar">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username"
                            aria-describedby="icon-addon1">
                    </div>
                </form>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                    aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupport">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ url('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('aboutus') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('doctors') }}">Doctors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('newsdetail') }}">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('contact')}}">Contact</a>
                        </li>
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('show_appointment') }}">Appointment</a>
                                </li>
                                <x-app-layout>
                                </x-app-layout>
                            @else
                                <li class="nav-item">
                                    <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">Register</a>
                                </li>
                            @endauth
                        @endif

                    </ul>
                </div> <!-- .navbar-collapse -->
            </div> <!-- .container -->
        </nav>
    </header>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
            <button type="button" class="close" data-dismiss="alert">X</button>
        </div>
    @endif

    <div class="page-hero bg-image overlay-dark" style="background-image: url(../assets/img/bg_image_1.jpg);">
        <div class="hero-section">
            <div class="container text-center wow zoomIn">
                <h1 class="display-4">News</h1>
            </div>
        </div>
    </div>


    <div class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">

                        @foreach ($news->chunk(2) as $items)
                        @foreach ($items as $item)
                            <div class="col-sm-6 py-3">
                                <div class="card-blog">
                                    <div class="header">
                                        <div class="post-category">
                                            <a href="#">Covid19</a>
                                        </div>
                                        <a href="{{url('news_open',$item->id)}}" class="post-thumb">
                                            <img src="news_image/{{ $item->image }}" alt="">
                                        </a>
                                    </div>
                                    <div class="body">
                                        <h5 class="post-title"><a href="{{url('news_open',$item->id)}}">{{ $item->topic }}</a>
                                        </h5>
                                        <div class="site-info">
                                            <div class="avatar mr-2">
                                                <div class="avatar-img">
                                                    <img src="writer_image/{{ $item->writer_image }}" alt="">
                                                </div>
                                                <span>{{ $item->writer }}</span>
                                            </div>
                                            <span class="mai-time"></span> 1 week ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endforeach
                        <div class="col-12 my-5">
                            {{ $news->links() }}
                        </div>
                    </div> <!-- .row -->
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-block">
                            <h3 class="sidebar-title">Search</h3>
                            <form action="#" class="search-form">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        placeholder="Type a keyword and hit enter">
                                    <button type="submit" class="btn"><span
                                            class="icon mai-search"></span></button>
                                </div>
                            </form>
                        </div>
                        <div class="sidebar-block">
                            <h3 class="sidebar-title">Categories</h3>
                            <ul class="categories">
                                <li><a href="#">Food <span>12</span></a></li>
                                <li><a href="#">Dish <span>22</span></a></li>
                                <li><a href="#">Desserts <span>37</span></a></li>
                                <li><a href="#">Drinks <span>42</span></a></li>
                                <li><a href="#">Ocassion <span>14</span></a></li>
                            </ul>
                        </div>

                        <div class="sidebar-block">
                            <h3 class="sidebar-title">Recent Blog</h3>
                            @foreach ($news_d->chunk(2) as $newss)
                            @foreach ($newss as $news)
                                <div class="blog-item">
                                    <a class="post-thumb" href="">
                                        <img src="news_image/{{ $news->image }}" alt="">
                                    </a>
                                    <div class="content">
                                        <h5 class="post-title"><a href="{{url('news_open',$item->id)}}">{{$news->topic}}</a></h5>
                                        <div class="meta">
                                            <a href="#"><span class="mai-calendar"></span> {{$news->created_at}}</a>
                                            <a href="#"><span class="mai-person"></span> {{$news->writer}}</a>
                                            <a href="#"><span class="mai-chatbubbles"></span> 19</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @endforeach

                            <div class="sidebar-block">
                                <h3 class="sidebar-title">Tag Cloud</h3>
                                <div class="tagcloud">
                                    <a href="#" class="tag-cloud-link">dish</a>
                                    <a href="#" class="tag-cloud-link">menu</a>
                                    <a href="#" class="tag-cloud-link">food</a>
                                    <a href="#" class="tag-cloud-link">sweet</a>
                                    <a href="#" class="tag-cloud-link">tasty</a>
                                    <a href="#" class="tag-cloud-link">delicious</a>
                                    <a href="#" class="tag-cloud-link">desserts</a>
                                    <a href="#" class="tag-cloud-link">drinks</a>
                                </div>
                            </div>

                            <div class="sidebar-block">
                                <h3 class="sidebar-title">Paragraph</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem
                                    necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa
                                    sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- .row -->
            </div> <!-- .container -->
        </div> <!-- .page-section -->


        <footer class="page-footer">
            <div class="container">
                <div class="row px-md-3">
                    <div class="col-sm-6 col-lg-3 py-3">
                        <h5>Company</h5>
                        <ul class="footer-menu">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Career</a></li>
                            <li><a href="#">Editorial Team</a></li>
                            <li><a href="#">Protection</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-3 py-3">
                        <h5>More</h5>
                        <ul class="footer-menu">
                            <li><a href="#">Terms & Condition</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Advertise</a></li>
                            <li><a href="#">Join as Doctors</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-3 py-3">
                        <h5>Our partner</h5>
                        <ul class="footer-menu">
                            <li><a href="#">One-Fitness</a></li>
                            <li><a href="#">One-Drugs</a></li>
                            <li><a href="#">One-Live</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-3 py-3">
                        <h5>Contact</h5>
                        <p class="footer-link mt-2">351 Willow Street Franklin, MA 02038</p>
                        <a href="#" class="footer-link">701-573-7582</a>
                        <a href="#" class="footer-link">healthcare@temporary.net</a>

                        <h5 class="mt-3">Social Media</h5>
                        <div class="footer-sosmed mt-3">
                            <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
                            <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
                            <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
                            <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
                            <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
                        </div>
                    </div>
                </div>

                <hr>

                <p id="copyright">Copyright &copy; 2020 <a href="https://macodeid.com/" target="_blank">MACode ID</a>.
                    All
                    right reserved</p>
            </div>
        </footer>

        <script src="../assets/js/jquery-3.5.1.min.js"></script>

        <script src="../assets/js/bootstrap.bundle.min.js"></script>

        <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

        <script src="../assets/vendor/wow/wow.min.js"></script>

        <script src="../assets/js/theme.js"></script>

</body>

</html>

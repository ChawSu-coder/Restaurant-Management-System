<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with FoodHut landing page.">
    <meta name="author" content="Devcrud">
    <title>FoodHut | Free Bootstrap 4.3.x template</title>
   
    <!-- font icons -->
    <link rel="stylesheet" href="user/assets/vendors/themify-icons/css/themify-icons.css">

    <link rel="stylesheet" href="user/assets/vendors/animate/animate.css">

    <!-- Bootstrap + FoodHut main styles -->
	<link rel="stylesheet" href="user/assets/css/foodhut.css">
    
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
     @if (session('booktable'))
            <div class="mb-4 bg-green border text-success text-center px-4 rounded relative">
                {{session('booktable')}}
            </div>
        @endif
    <!-- Navbar -->
    <nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#gallary">Gallary</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#book-table">Book-Table</a>
                </li>
            </ul>
            <a class="navbar-brand m-auto" href="#">
                {{-- <img src="assets/imgs/logo.svg" class="brand-img" alt=""> --}}
                <span class="brand-txt">Food Hut</span>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#blog">Blog<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testmonial">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact Us</a>
                </li>
                
            <!-- check login or not  -->
            @if (Route::has('login'))
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('food.cart')}}">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard')}}">dashboard</a>
                </li>
            </ul>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Log in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">Sign up</a>
                </li>
                @endauth
            @endif
        </div>
    </nav>
    
    <div class="container-fluid bg-dark text-light text-center mt-5 py-5">
        @yield('show_cart')
    </div>

    <!-- header -->
    <header id="home" class="header">
        <div class="overlay text-white text-center">
            <h1 class="display-2 font-weight-bold my-3">Food Hut</h1>
            <h2 class="display-4 mb-5">Always fresh &amp; Delightful</h2>
            <a class="btn btn-lg btn-primary" href="#gallary">View Our gallary</a>
        </div>
    </header>

    <div class="container" >
       <form action="{{route('search-food')}}" class="my-3"> 
            @csrf         
            <div class="input-group mb-3">
                <input type="text" autocomplete="false" value="{{request('search')}}" name="search" class="form-control" placeholder="Search Foods...">
                <button class="btn input-group-text" style="color: green">Search</button> 
            </div>        
        </form> 
    </div>
    
    <!--  gallary Section  -->
    <div id="gallary" class="text-center bg-dark text-light has-height-md middle-items wow fadeIn">
        <h2 class="section-title">OUR MENU</h2>
    </div>
    
    <!-- BLOG Section  -->
    <div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="foods" role="tabpanel" aria-labelledby="pills-home-tab">
                @yield('home')
                @yield('search_food')
            </div>
        </div>
    </div>

    <!-- book a table Section  -->
    <div class="container-fluid has-bg-overlay text-center text-light has-height-lg middle-items" id="book-table">
        <div class="">
            <h2 class="section-title mb-5">BOOK A TABLE</h2>
            <form action="{{route('book.table')}}" method="post">
            @csrf
            <div class="row mb-5">
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="email" name="email" id="booktable" class="form-control form-control-lg custom-form-control" placeholder="EMAIL" required>
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="number" name="guest_numbers" id="booktable" class="form-control form-control-lg custom-form-control" placeholder="NUMBER OF GUESTS" max="20" min="1" required>
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="time" name="time" id="booktable" class="form-control form-control-lg custom-form-control" placeholder="EMAIL" required>
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="date" name="date" id="booktable" class="form-control form-control-lg custom-form-control" placeholder="12/12/12" required>
                </div>
            </div>
            <button class="btn btn-primary text-center">Find Table</button>
            </form>
            
        </div>
    </div>

    <!-- page footer  -->
    <div class="container-fluid bg-dark text-light has-height-md middle-items border-top text-center wow fadeIn">
        <div class="row">
            <div class="col-sm-4">
                <h3>EMAIL US</h3>
                <P class="text-muted">foodhut@website.com</P>
            </div>
            <div class="col-sm-4">
                <h3>CALL US</h3>
                <P class="text-muted">(01) 456-7890</P>
            </div>
            <div class="col-sm-4">
                <h3>FIND US</h3>
                <P class="text-muted">Yangon</P>
            </div>
        </div>
    </div>
    <div class="bg-dark text-light text-center border-top wow fadeIn">
        <p class="mb-0 py-3 text-muted small">&copy; Copyright <script>document.write(new Date().getFullYear())</script> Made with <i class="ti-heart text-danger"></i> By <a href="https://github.com/ChawSu-coder">Chaw Su</a></p>
    </div>
    <!-- end of page footer -->

	<!-- core  -->
    <script src="user/assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="user/assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap affix -->
    <script src="user/assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- wow.js -->
    <script src="user/assets/vendors/wow/wow.js"></script>
    
    <!-- google maps -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>

    <!-- FoodHut js -->
    <script src="user/assets/js/foodhut.js"></script>

</body>
</html>

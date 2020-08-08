

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>TheSaaS — Blog with sidebar</title>

    <!-- Styles -->
    <link href="{{asset('css/page.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}"  rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="icon" href="{{asset('img/favicon.png')}}">
  </head>

  <body>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">

        <div class="navbar-left">
          <button class="navbar-toggler" type="button">&#9776;</button>
          <a class="navbar-brand" href="../index.html">
            <img class="logo-dark" src="{{asset('img/logo-dark.png')}}" alt="logo">
            <img class="logo-light" src="{{asset('img/logo-light.png')}}" alt="logo">
          </a>
        </div>

        <section class="navbar-mobile">
          <span class="navbar-divider d-mobile-none"></span>

          <ul class="nav nav-navbar">
           
              
              <ul class="nav">

     

          </ul>
        </section>

      <a class="btn btn-xs btn-round btn-success" href="{{route('login')}}">Login</a>

      </div>
    </nav><!-- /.navbar -->


    <!-- Header -->
    <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
      <div class="container">

        <div class="row">
          <div class="col-md-8 mx-auto">

            <h1>Latest Blog Posts</h1>
            <p class="lead-2 opacity-90 mt-6">Read and get updated on how we progress</p>

          </div>
        </div>

      </div>
    </header><!-- /.header -->


    <!-- Main Content -->
    <main class="main-content">
      <div class="section bg-gray">
        <div class="container">
          <div class="row">


            <div class="col-md-8 col-xl-9">
            <div class="row gap-y">
                @forelse ($posts as $post)
                    
             
                <div class="col-md-6">
                  <div class="card border hover-shadow-6 mb-6 d-block">
                    <?php $image= 'storage/'.$post->image;   ?>
                  <a href="{{route('blog.show',$post->id)}}"><img class="card-img-top" src="{{asset($image)}}" alt="Card image cap"></a>
                    <div class="p-6 text-center">
                    <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="">{{$post->category->name}}</a></p>
                    <h5 class="mb-0"><a class="text-dark" href="{{route('blog.show',$post->id)}}">{{$post->title}}</a></h5>
                    </div>
                  </div>
                </div>

                @empty
                <p class="text-center">
                No result found for query <strong>{{request()->query('search')}}</strong>
                </p>
                    
              

             
                @endforelse
              </div>


               {{$posts->appends(['search'=>request()->query('search')])->links()}}
            </div>



            <div class="col-md-4 col-xl-3">
              <div class="sidebar px-4 py-md-0">

                <h6 class="sidebar-title">Search</h6>
              <form class="input-group" action="{{route('welcome')}}"  method="GET">
              <input type="text" class="form-control" name="search" placeholder="Search" value="{{request()->query('search')}}">
                  <div class="input-group-addon">
                    <span class="input-group-text"><i class="ti-search"></i></span>
                  </div>
                </form>

                <hr>

                <h6 class="sidebar-title">Categories</h6>
                <div class="row link-color-default fs-14 lh-24">
                  @foreach ($categories as $category)
                <div class="col-6"><a href="#">{{$category->name}}</a></div>
                  @endforeach
                  
                </div>

                <hr>

               
                <hr>

                <h6 class="sidebar-title">Tags</h6>
                <div class="gap-multiline-items-1">
                 
               @foreach ($tags as $tag)
                <a class="badge badge-secondary" href="#">{{$tag->name}}</a>
               @endforeach
                </div>

              


              </div>
            </div>

          </div>
        </div>
      </div>
    </main>


    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="row gap-y align-items-center">

         

        </div>
      </div>
    </footer><!-- /.footer -->


    <!-- Scripts -->
    <script src="{{asset('js/page.min.js') }}"></script>
    <script src="{{asset('js/script.js')}}"></script>

  </body>
</html>

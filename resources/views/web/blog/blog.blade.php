<!doctype html>
<html lang="en">

<head>
    @include('web.include.head')
</head>

<body>
    @include('web.include.header')
    <!-- breadcrumbs end -->
        <section class="blog-area ptb-100 blog-3-column">
            <div class="container">
                <div class="row">
                    @foreach($blog_list as $blog_list)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-part mb-60">
                            <div class="blog-img">
                                <a href="#"><img src="{{asset('img/blog/'. $blog_list->image)}}" alt=""></a>
                            </div>
                            <div class="blog-info">
                                <div class="blog-meta">
                                    <span>
                                        <i class="fa fa-user"></i>
                                        {{ $blog_list->first_name }}
                                    </span>
                                    <span>
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        {{$blog_list->date}}
                                    </span>
                                </div>
                                <h3><a href="/blog/{{ $blog_list->slug }}">{{ $blog_list->title }}</a></h3>
                                <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad </p>-->
                                <a href="/blog/{{ $blog_list->slug }}">READ MORE</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                     
                </div>
                 
            </div>
        </section>
    
    
    @include('web.include.footer')
</body>

</html>
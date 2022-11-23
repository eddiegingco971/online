
<div class="footer-area  d-none d-sm-none d-md-block d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="footer-heading">Mac Kaon FoodHub</h4>
                <div class="footer-underline"></div>
                <p>
                    Thank you for always choosing Mac Kaon.

                </p>
            </div>
            <div class="col-md-3">
                <h4 class="footer-heading">Quick Links</h4>
                <div class="footer-underline"></div>
                <div class="mb-2"><a href="{{url('/')}}" class="text-white">Home</a></div>
                <div class="mb-2"><a href="{{url('/about')}}" class="text-white">About Us</a></div>
            </div>
            <div class="col-md-3">
                @php
                    $categories = DB::table('categories')->where('status','active')->get();
                @endphp
                <h4 class="footer-heading">Order Now</h4>
                <div class="footer-underline"></div>
                @foreach ($categories as $category)
                    <div class="mb-2"><a href="{{url('/collections/'.$category->category_name)}}" class="text-white">{{$category->category_name}}</a></div>
                @endforeach
            </div>
            <div class="col-md-3">
                <h4 class="footer-heading">Reach Us</h4>
                <div class="footer-underline"></div>
                <div class="mb-2">
                    <p>
                        <a href="https://goo.gl/maps/5ZvTkc1UrZwgeK4W9" class="text-light">
                           <i class="fa fa-map-marker"></i><u> 6344, G. Orapa Street, Poblacion Danao, Bohol.</u>
                        </a>
                    </p>
                </div>
                <div class="mb-2">
                    <a href="" class="text-white">
                        <i class="fa fa-phone"></i> +63 9127891836
                    </a>
                </div>
                <div class="mb-2">
                    <a href="" class="text-white">
                        <i class="fa fa-envelope"></i> mackaon@gmail.com
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="copyright-area d-none d-sm-none d-md-block d-lg-block">
    <div class="container ">
        <div class="row">
            <div class="col-md-8">
                <p class=""> &copy; 2022 - Mac Kaon FoodHub. All rights reserved.</p>
            </div>
            <div class="col-md-4">
                <div class="social-media">
                    Get Connected:
                    <a href="https://www.facebook.com/macjemsmackaon/"><i class="fab fa-facebook-square"></i></a>
                    <a href=""><i class="fab fa-twitter-square"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-youtube-square"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

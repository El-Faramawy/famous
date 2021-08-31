<?php
$setting = \App\Models\Setting::first();
?>

<div class=" footer-section">
    <!-- Footer -->
    <div class="footer">
        <img class="shape-1 animation-down" src="{{url('site')}}/img/shape-21.png">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="footer-widget">
                        <div class="logo">
                            <a href="{{url('/')}}"><img src="{{url('site')}}/img/logo.png"></a>
                        </div>

                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="footer-widget">
                        <h4 class="footer-title">منصة صيت المشاهير</h4>
                        <ul class="widget-info">
                            <li>
                                <p> <i class="fas fa-envelope"></i> <a href="{{$setting->email}}">{{$setting->email}}</a> </p>
                            </li>
                            <li>
                                <p> <i class="fa fa-phone"></i> <a href="{{$setting->whatsapp}}">{{$setting->phone}}</a> </p>
                            </li>
                        </ul>
                        <ul class="social">
                            <li><a href="{{$setting->facebook}}" target="_blank"><i class="fab fa-facebook-f"> </i></a></li>
                            <li><a href="{{$setting->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{$setting->whatsapp}}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                            <li><a href="{{$setting->youtube}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="footer-widget">
                        <h4 class="footer-title">تطبيقاتنا</h4>
                        <div class="widget-subscribe row">
                            <a class="col-6 col-md-12 p-1" href="#!"> <img style="width: 180px;" src="{{url('site')}}/img/Google-Play.png"> </a>
                            <a class="col-6 col-md-12 p-1" href="#!"> <img style="width: 180px;" src="{{url('site')}}/img/App-Store.png"> </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-widget">
                        <h4 class="footer-title">اخبارنا</h4>
                        <div class="widget-subscribe">

                            <div class="widget-form">
                                <form action="{{route('site_offers')}}" method="post">
                                    @csrf
                                    <input type="text" placeholder="البريد الالكتروني" name="email" required>
                                    <button type="submit" href="#!" class="animateBTN"> اشترك الان </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img class="shape-2 animation-left" src="{{url('site')}}/img/shape-22.png">
    </div>
    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="copyright-wrapper">
                <div class="copyright-text">
                    <p>جميع الحقوق محفوظة <a href="http://motaweron.com/?fbclid=IwAR10HZ7WgoWploNKrGPck_u1Fkg8LfwIU6W5Y74Mvq3YMEaIUo_G5HP6Mj4">المطورون</a> &copy; 2021 </p>
                </div>
            </div>
        </div>
    </div>
</div>

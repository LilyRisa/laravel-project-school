<div id="row-5" class="row-5">
    <div class="container-fuild">
        <div class="title wow bounce animated">
            <center>
                <h2><a href="/giang-vien.html">Đội ngũ giảng viên</a></h2>
                <div class="gach-left"></div>
                <div class="gach-right"></div>
            </center>
        </div>
        <div class="list-tea">
            <div class="container">
                <div id="owl-carousel-gt" class="owl-carousel owl-theme wow fadeInUp">
                    @foreach($teach as $tc)
                    <div class="item tea-item  wow slideInDown">
                        <a href="#" class="imagez">
                            <img src="{{asset('images')}}/{{$tc->teach_avatar}}" class="img-responsive img-zoom" alt="Lê Việt Hùng">
                        </a>
                        <div class="text">
                            <a href="#" class="h4 hover-mo">
			                    {{$tc->teach_name}}		
                                           </a>
                                           <br/>
                            
                            {{$tc->meta}}
                            <div class="icon">
                                <ul>
                                    <li><a href="tel:{{$tc->teach_phone}}" data-toggle="tooltip" data-placement="top" title="{{$tc->teach_phone}}"><i class="fa fa-phone"></i></a></li>
                                    <li><a href="{{$tc->teach_facebook}}" target="_blank" data-toggle="tooltip" data-placement="top" title=""><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="mailto:{{$tc->teach_email}}" data-toggle="tooltip" data-placement="top" title="{{$tc->teach_email}}"><i class="fa fa-envelope"></i></a></li>
                                    <li><a href="skype:{{$tc->teach_skype}}" data-toggle="tooltip" data-placement="top" title=""><i class="fab fa-skype"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                   @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
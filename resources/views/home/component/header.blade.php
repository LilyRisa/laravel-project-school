<div id="header">
        <div id="header-1">
            <div class="container">
                <div class="col-md-8 col-sm-8 col-xs-12 text repons-lg">
                    <ul class="left">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> {{$home->address}} </li>
                        <li><a href="tel: {{$home->phone}}"><i class="fa fa-phone" aria-hidden="true"></i><span> {{$home->phone}}</span></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 text repons-lg">
                    <div class="right">
                        <!-- <i class="fa fa-key" aria-hidden="true"></i></i><a href="#">Đăng ký</a> / <a href="#">Đăng nhập</a> -->
                    </div>
                </div>
            </div>
        </div>
        <div id="header-2">
            <div class="container slide-nav">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 res-scroll">
                        <h1 style="font-size: 0px;"> {{$home->name}}                            <a href="{{route('home')}}" title="Trung tâm Gia sư sư phạm chất lượng cao số 1 Hà Nội" class="wow fadeInDown" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInDown;">

                                <img src="{{asset('images')}}/{{$home->logoSite}}" alt="Về trang chủ" class="img-responsive">
                            </a>
                        </h1>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" id="nav">

                        <nav class="navbar navbar-inverse">
                            <div class="container-fluid-1">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <!-- <a class="navbar-brand" href="#">WebSiteName</a> -->
                                </div>
                                <div class="collapse navbar-collapse" id="myNavbar">
                                    <ul class="nav navbar-nav">
                                        <li class=" ">
                                            <a class="" href="{{route('home')}}">Trang chủ</a>
                                        </li>
                                        @foreach($category as $ct)
                                        <li class=" dropdown">
                                            <a class="dropdown-toggle" href="#">{{$ct->name}}</a>
                                            <ul class="dropdown-menu">
                                                @foreach($category_child as $ctc)
                                                @if($ctc->category_id == $ct->id)
                                                <li><a href="{{route('blog_category',['id' => $ctc->id])}}">{{$ctc->name}}</a>
                                                </li>
                                                @endif
                                                @endforeach
                                                
                                            </ul>
                                        </li>
                                        @endforeach
                                        <li class=" ">
                                            <a class="" href="{{route('homefindteach')}}">Tìm gia sư</a>
                                        </li>
                                        <li class=" ">
                                            <a class="" href="{{route('contact')}}">Liên hệ</a>
                                        </li>
                                        
                                        <li class="repons-sm">
                                            <a href="#"><i class="fa fa-key" aria-hidden="true"></i> Đăng ký </a> - <a href=""><i class="fa fa-key" aria-hidden="true"></i> Đăng nhập </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-4 holine-hd2">
                        <div class="content-footer text">
                            <div class="call-header pull-right">
                                <div class="baoanh-alo-phone">
                                    <a href="tel:{{$home->phone}}">
                                        <div class="animated infinite zoomIn baoanh-alo-ph-circle">&nbsp;</div>
                                        <div class="animated infinite pulse baoanh-alo-ph-circle-fill">&nbsp;</div>
                                        <div class="animated infinite tada baoanh-alo-ph-img-circle">&nbsp;</div>
                                        <p><span style="margin-left:45px;">{{$home->phone}}</span></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="menu-btn-show">
                        <span class="border-style"></span>
                        <span class="border-style"></span>
                        <span class="border-style"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
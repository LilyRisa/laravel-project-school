<div id="footer">
    <div class="container">
        <div class="col-md-3 wow fadeInLeft info-footer" style="visibility: visible; animation-name: fadeInLeft;">
            <p><strong>{{$home->name}}</strong></p>

            <ul>
                <li>{{$home->address}}</li>
                <li>Phụ huynh liên hệ: {{$home->phone}}</li>
                <li>Gia sư liên hệ: {{$home->phone}}
                    <style type="text/css">
                        <!--td {
                            border: 1px solid #ccc;
                        }
                        
                        br {
                            mso-data-placement: same-cell;
                        }
                        
                        -->
                    </style>
                    {{$home->phone}}</li>
                <li>Email: {{$home->email}}</li>
            </ul>

            <ul class="icon social-footer">
                <li>
                    <a href="{{$home->linkFB}}" target="_blank" rel="nofollow"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="{{$home->linkTW}}" target="_blank" rel="nofollow"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>
        <div class="col-md-3 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <h4 class="sm-title h4">Bài viết gần đây</h4>
            <div class="content row-2">
                <ul class="list">
                    <li>
                        <div class="pr-item">
                            <div class="canlendar">
                                <div class="gach-left"></div>
                                <div class="gach-bottom"></div>
                                <div class="goclich_bg"></div>
                                <!--                                <img src="-->
                                <!--/images/goclich.png" alt="calendar">-->
                                <div class="text">
                                    <span class="up">08</span>
                                    <span class="down">Tháng 11</span>
                                </div>
                            </div>
                            <div class="pr-content">
                                <a href="#">Hợp Đồng Nhận Lớp Tại Trung Tâm Gia Sư Đức Minh</a>
                                <div class="chat-add">

                                    <div class="view">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        <span> 120 Lượt xem</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="pr-item">
                            <div class="canlendar">
                                <div class="gach-left"></div>
                                <div class="gach-bottom"></div>
                                <div class="goclich_bg"></div>
                                <!--                                <img src="-->
                                <!--/images/goclich.png" alt="calendar">-->
                                <div class="text">
                                    <span class="up">23</span>
                                    <span class="down">Tháng 06</span>
                                </div>
                            </div>
                            <div class="pr-content">
                                <a href="#">TÌM ĐỒNG ĐỘI 2018</a>
                                <div class="chat-add">

                                    <div class="view">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        <span> 693 Lượt xem</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="pr-item">
                            <div class="canlendar">
                                <div class="gach-left"></div>
                                <div class="gach-bottom"></div>
                                <div class="goclich_bg"></div>
                                <!--                                <img src="-->
                                <!--/images/goclich.png" alt="calendar">-->
                                <div class="text">
                                    <span class="up">03</span>
                                    <span class="down">Tháng 05</span>
                                </div>
                            </div>
                            <div class="pr-content">
                                <a href="#">Kinh nghiệm tìm trung tâm uy tín khi làm gia sư tại Hà Nội</a>
                                <div class="chat-add">

                                    <div class="view">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        <span> 480 Lượt xem</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-3 wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">
            <div class="content-footer text">
                <div class="box-ft box-fb" style="width:280px;">
                    <h4 class="sm-title h4">Facebook</h4>

                    <div id="fb-root" class=" fb_reset">
                    </div>
                    <script>
                        (function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=108648806140957";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                    </script>

                    {{-- <div class="fb-page fb_iframe_widget" data-adapt-container-width="true" data-height="224" data-hide-cover="false" data-href="https://www.facebook.com/giasuducminh/" data-show-facepile="true" data-show-posts="false" data-small-header="false" data-width="300" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=108648806140957&amp;container_width=280&amp;height=224&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fgiasuducminh%2F&amp;locale=en_US&amp;sdk=joey&amp;show_facepile=true&amp;show_posts=false&amp;small_header=false&amp;width=300"><span style="vertical-align: bottom; width: 280px; height: 214px;"><iframe name="f3f7c49765991f8" width="300px" height="224px" title="fb:page Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v2.3/plugins/page.php?adapt_container_width=true&amp;app_id=108648806140957&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D44%23cb%3Df63ef993fc46bc%26domain%3Dgiasuducminh.com%26origin%3Dhttps%253A%252F%252Fgiasuducminh.com%252Ff3dd72e54edc14c%26relation%3Dparent.parent&amp;container_width=280&amp;height=224&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fgiasuducminh%2F&amp;locale=en_US&amp;sdk=joey&amp;show_facepile=true&amp;show_posts=false&amp;small_header=false&amp;width=300" style="border: none; visibility: visible; width: 280px; height: 214px;" class=""></iframe></span></div> --}}
                </div>
            </div>
        </div>
        <div class="col-md-3 wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">
            <div class="content-footer text">
                <h4 class="sm-title h4">Bản đồ</h4>
                <div class="box-ft box-map">
                    {!!$home->mapIframe!!}
                </div>
            </div>

        </div>
    </div>
</div>

<div class="copyright">
    <div class="content-footer text">
        <p style="text-align: center;">© Copyright Minh Tam Bui</p>
    </div>
    <span class="backtotop"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></span>

</div>
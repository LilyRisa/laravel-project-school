<div id="row-3" class="row-3 autonumber1" style="background-image: url({{asset('img/bgr2_1.jpg')}});">
    <div class="container-fluid up">
        <div class="box">
            <div class="content-up">
                <div class="content-footer text">
                    <div class="title  wow bounce animated">
                        <center>
                            <h3>{{$home->name}}</h3>
                        </center>
                    </div>

                    <div class="content  wow  fadeInRight animated">
                        <center>
                            <p style="text-align: center;">{{$home->description}}</p>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="container center" id="auto-rise-num">
            <div class="col-md-2 col-xs-6 wow  fadeInLeft animated">
                <div class="rice">
                    <div class="box-image-intro">
                        <img src="{{asset('img/pt.png')}}" class="img-responsive" alt="Năm phát triển ">
                    </div>
                    <div class="box-info-intro">
                        <span class="center autonumber" data-number="17
">0</span>
                        <span class="right">Năm phát triển </span>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-xs-6 wow  fadeInLeft animated">
                <div class="rice">
                    <div class="box-image-intro">
                        <img src="{{asset('img/ay.png')}}" class="img-responsive" alt="Học viên">
                    </div>
                    <div class="box-info-intro">
                        <span class="center autonumber" data-number="20288
">0</span>
                        <span class="right">Học viên</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-xs-6 wow  fadeInLeft animated">
                <div class="rice">
                    <div class="box-image-intro">
                        <img src="{{asset('img/usr.png')}}" class="img-responsive" alt="Fans">
                    </div>
                    <div class="box-info-intro">
                        <span class="center autonumber" data-number="25100
">0</span>
                        <span class="right">Fans</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-xs-6 wow  fadeInLeft animated">
                <div class="rice">
                    <div class="box-image-intro">
                        <img src="{{asset('img/musr.png')}}" class="img-responsive" alt="Khóa học">
                    </div>
                    <div class="box-info-intro">
                        <span class="center autonumber" data-number="32523
">0</span>
                        <span class="right">Khóa học</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-xs-6 wow  fadeInLeft animated">
                <div class="rice">
                    <div class="box-image-intro">
                        <img src="{{asset('img/cous.png')}}" class="img-responsive" alt="Gia sư">
                    </div>
                    <div class="box-info-intro">
                        <span class="center autonumber" data-number="72005
">0</span>
                        <span class="right">Gia sư</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-xs-6 wow  fadeInLeft animated">
                <div class="rice">
                    <div class="box-image-intro">
                        <img src="{{asset('img/gr.png')}}" class="img-responsive" alt="Khách hàng">
                    </div>
                    <div class="box-info-intro">
                        <span class="center autonumber" data-number="15787
">0</span>
                        <span class="right">Khách hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fuild down">
        
    </div>
</div>


<script>
        $(document).ready(function () {
            // function autonaumber
//            var pos = $("#auto-rise-num").position().top;
            var pos = $(".autonumber1").position().top;
            var autonumber = $(".autonumber");
            var myScrollFunc = new Array();
            var myScrollFunc = function () {
                var y = window.scrollY;
                // console.log(y);
                if (y >= pos && y <= pos + 900) {
//                if (y <= pos + 100) {
                    autonumber.each(function () {
                        var obj = $(this);
                        var millis = 50;
                        var speed = 50;
                        var end = parseInt(obj.attr("data-number"));
                        var start = 0;
                        if (end > speed) start = end % speed;
                        var jum = 1;
                        if (end > speed) jum = parseInt(end / speed);
                        // if(parseInt(obj.attr("data-number"))-20>0) start=parseInt(obj.attr("data-number"))-20;
                        var refreshIntervalId = setInterval(function () {
                            obj.html(function () {
                                if (start < end) return start += jum;
                                else clearInterval(refreshIntervalId);
                            });
                        }, millis);
                    });
                    window.removeEventListener("scroll", myScrollFunc);
                }
            };
            window.addEventListener("scroll", myScrollFunc);
            //end  function autonaumber
        })

    </script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            $('.reg-course-form1').click(function () {
                $("html, body").animate({
                    scrollTop: 1140
                }, 600);
                return false;
            });
        });
    </script>
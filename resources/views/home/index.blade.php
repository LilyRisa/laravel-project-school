@extends('home.layout')

@section('content')
<style type="text/css">.dmca {margin-top: 20px;}</style>
<img src="/images/no-image.png" width="0" height="0" style="width: 0; height: 0; display: none;" rel="nofollow" alt="Thong ke" data-src="/thong-ke.jpg">
<div id="row-1" class="row-1 wow slideInUp  animated" style="visibility: visible; animation-name: slideInUp;">
    <div class="container">
        <div class="title wow bounce" style="visibility: visible; animation-name: bounce;">
            <center>
                <a href="#"><h2>Bài viết mới nhất</h2></a>
                <div class="gach-left"></div>
                <div class="gach-right"></div>
            </center>
        </div>
        <div class="list-pr">
            <div class="row">
                <div class="col-md-3 content wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                    <div class="item list">
                        <div class="content-about-us">
                            <div class="content-ab">
                                <div role="tabpanel">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
                <div class="col-md-9 wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">
                    <div id="owl-carousel3" class="owl-carousel owl-theme owl-loaded owl-drag">
                        @foreach($blog as $bl)
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 600px;">
                                
                                <div class="owl-item active" style="width: 270px; margin-right: 30px;">
                                    <div class="item list">
                                        <a href="{{route('blog_item', ['id' => $bl->blog_id])}}" class="imagez">
                                        	@foreach($image as $im)
                                        	@if($bl->img_id == $im->id)
                                            <img class="img-responsive img-op" src="{{asset('/')}}{{$im->url}}" alt="Gia sư Đức Minh - Hà Nội">
                                            @endif
                                            @endforeach
                                        </a>
                                        <div class="text">
                                            <a href="{{route('blog_item', ['id' => $bl->blog_id])}}" class="h4">{{$bl->blog_title}}</a>
                                            <div>
                                                <p>{{$bl->blog_meta}}</p>
                                            </div>
                                            <a href="{{route('blog_item', ['id' => $bl->blog_id])}}"><span class="hover-mo">Xem chi tiết <i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                         @endforeach
                        <div class="owl-nav disabled">
                            <div class="owl-prev disabled"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
                            <div class="owl-next disabled"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
                        </div>
                        <div class="owl-dots disabled">
                            <div class="owl-dot active"><span></span></div>
                        </div>
                    </div>
                </div>
				
            </div>
        </div>
    </div>
</div>

{{-- form contact --}}
<div id="row-6" class="row-6" style="background-image: url({{asset('img/row6_1.jpg')}});
    overflow: hidden;">
    <div class="container-fuild bong" style="background: url({{asset('img/bong.png')}});
    height: 100%;
    padding-bottom: 55px;">
        <div class="container">
            <div id="reg-course-form1">
                <div class="title wow bounce animated">
                    <h3>Đăng ký tìm gia sư</h3>
                    <div class="gach-left"></div>
                    <div class="gach-right"></div>
                </div>
                <div class="row">
                    <div class="text wow slideInLeft animated col-lg-10 col-md-10 col-sm-10">
                        <p>Hãy hoàn thành form đăng kí bên dưới để chúng tôi có thể sắp xếp cho bạn một lịch học hợp lý nhất, mọi thắc mắc xin gửi thư đến địa chỉ <u>email: {{$home->email}}</u> hoặc gọi điện đến số <u> {{$home->phone}}</u> để được tư vấn miễn phí</p>
                    </div>
                    <div class="col-lg-5 form  wow slideInRight animated" id="reg-course-form">
                        <form enctype="multipart/form-data" class="w3f-form" role="form" id="w3n-submit-form " action="/site/form/submit/id/1610" method="post">
                            <div class="frm-item">
                                <div class="label"><i class="fa fa-user-plus" aria-hidden="true"></i></div>
                                <input class="text" placeholder="Họ và tên *" type="text" value="" name="W3NF[9829][c21]" id="W3NF_9829_c21" />
                                <div class="errorMessage" id="AutoForm_c21_em_" style="display:none"></div>
                            </div>
                            <div class="frm-item">
                                <div class="label"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                <input class="text" placeholder="Điện thoại của bạn *" type="text" value="" name="W3NF[9831][c83]" id="W3NF_9831_c83" />
                                <div class="errorMessage" id="AutoForm_c83_em_" style="display:none"></div>
                            </div>
                            <div class="frm-item">
                                <div class="label"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                <input class="text" placeholder="Email của bạn *" type="text" value="" name="W3NF[9830][c52]" id="W3NF_9830_c52" />
                                <div class="errorMessage" id="AutoForm_c52_em_" style="display:none"></div>
                            </div>
                            <div class="frm-item textArea-item">
                                <textarea class="text" placeholder="Nội dung" name="W3NF[9991][c193]" id="W3NF_9991_c193"></textarea>
                                <div class="errorMessage" id="AutoForm_c193_em_" style="display:none"></div>
                            </div>
                            <div class="frm-item button">
                                <button type="submit" id="submitForm">Đăng ký tìm gia sư</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- blog --}}
<div id="row-2" class="row-2 layout-row-2">
    <div class="row-2-content">
    	@foreach($category as $ct)
        <div class="layout-cate layout-cate1 clearfix">
            <div class="container">
                <div class="layout-content-cate layout-content-cate1">
                    <div class="title wow bounce animated">
                        <center>
                            <a href="#"><h3>{{$ct->name}}</h3></a>
                            <div class="gach-left"></div>
                            <div class="gach-right"></div>
                        </center>
                    </div>
                    <div class="list-pr">
                    	@foreach($category_child as $ctc)
                    	@if($ctc->category_id == $ct->id)
                        <div class="col-md-4 pr-item center  wow  fadeInUp animated">
                            <div class="pr-title" style="background-image: url({{asset('img/nen_x.png')}});">
                                <div class="box">
                                    <!--                                    <span class="h4">-->
                                    <!--</span>-->
                                    <a href="{{route('blog_category',['id' =>$ctc->id])}}" class="h4">{{$ctc->name}}</a>
                                </div>
                            </div>
                            <div class="content">
                                <ul class="list">
                                	@foreach($blogall as $bla)
                                	@if($bla->category_child_id == $ctc->id)
                                    <li>
                                        <a href="{{route('blog_item', ['id' => $bla->blog_id])}}">
                                            <i class="fa fa-book" aria-hidden="true"></i> {{$bla->blog_title}} </a>
                                    </li>
                                    @endif
                                    @endforeach
                                    
                                </ul>
                                <span class="view-all hover-mo">
                                            <a href="{{route('blog_category',['id' =>$ctc->id])}}">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i> Xem tất cả
                                            </a>
                                        </span>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        

    </div>
</div>
 <script>
    $(document).ready(function(){
        $('#submitForm').on('click',function(e){ 
            e.preventDefault();
            if($('#W3NF_9829_c21').val() == '' || $('#W3NF_9831_c83').val() == '' || $('#W3NF_9830_c52').val() == '' ||  $('#W3NF_9991_c193').val() == ''){
                $.notify({
                      icon: 'pe-7s-gift',
                      message: "Vui lòng nhập đầy đủ thông tin"

                      },{
                    type: 'warning',
                    timer: 1000
                });

            }else{ 
                var data = {
                    fullname : $('#W3NF_9829_c21').val(),
                    address : '',
                    phone : $('#W3NF_9831_c83').val(),
                    email : $('#W3NF_9830_c52').val(),
                    stclass : '',
                    school : '',
                    sex : '',
                    learning : '',
                    tieuhoc : '',
                    toan : '',
                    tiengviet : '',
                    toeic : '',
                    vatly : '',
                    tienganh : '',
                    laptrinh : '',
                    monkhac :'',
                    sl : '0',
                    purpose :'Chưa nhập thông tin',
                    ask : $('#W3NF_9991_c193').val(),
                    status:0,
                    _token : '{{ csrf_token() }}'

                };
                console.log(data);
             $.ajax({
                url : '{{route('home_findteach_post')}}',
                type : 'POST',
                data : data,  
            success : function (data){
                var data = JSON.parse(data);
                console.log(data.status);
                if(data.status == 200){
                    $.notify({
                      icon: 'pe-7s-gift',
                      message: data.messenges

                      },{
                    type: 'info',
                    timer: 4000
                });
                    $('form').fadeIn("slow").hide();
                    $('#result').html(data.messenges).fadeIn("slow");
                }else{
                    alert('Lỗi không xác định! ');
                }
                
            }
            });
         }

        });
       
    });
</script>
@endsection
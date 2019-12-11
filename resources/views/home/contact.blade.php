@extends('home.layout')

@section('content')
<style type="text/css">.dmca {margin-top: 20px;}</style>
<div id="row-1" class="row-lienhe-1 wow slideInUp  animated" style="visibility: visible; animation-name: slideInUp;">
    <div class="container">
        <div class="title wow bounce" style="visibility: visible; animation-name: bounce;">
            <center>
                <h3>Thông tin liên hệ</h3>
                <div class="gach-left"></div>
                <div class="gach-right"></div>
            </center>
        </div>
        <div class="content">
            <div id="lh" class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="icon">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <span>Địa chỉ liên hệ</span>
                        <p>{{$home['address']}}</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 center">
                    <div class="icon">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <span>Email hỗ trợ</span>
                        <p>{{$home['email']}}</p>
                    </div>
                </div>
                <div class="col-md-4  col-sm-4  col-xs-12">
                    <div class="icon">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                    <div class="text">
                        <span>Số điện thoại</span>
                        <p>{{$home['phone']}}</p>
                    </div>
                </div>
            </div>
            <div id="map">
                <div class="content-footer text">
                    <h4 class="sm-title h4">Map</h4>
                    <div class="box-ft box-map">
                        {!!$home['mapIframe']!!}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div id="row-2" class="row-5 row-lienhe-2">
    <div class="container-fuild">

        <div class="title wow bounce  animated" style="visibility: visible; animation-name: bounce;">
            <center>
                <h3>Bạn có câu hỏi nào không</h3>
                <div class="gach-left"></div>
                <div class="gach-right"></div>
            </center>
        </div>
        <div class="list-tea">
            <div class="container">
                <div class="title-sm">
                    <center>Bạn có bất kì câu hỏi hay thắc mắc nào, hãy gửi cho chúng tôi một email, các tư vấn viên của chúng tôi sẽ đưa ra các giải pháp tốt nhất cho bạn ngay sau khi nhận được email của bạn.</center>
                </div>
                <div class="row wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="col-md-3 tea-item  wow slideInLeft" style="visibility: visible; animation-name: slideInLeft;">
                        <a class="imagez">
                            <img src="https://giasuducminh.com/mediacenter/media/images/1590/siteusers/ava/s350_350/img3820-1501425708.jpg" class="img-responsive" alt="admin">
                        </a>
                        <div class="text">
                            <a class="h4 hover-mo">
		        Admin - CSKH		    </a>
                            <div class="icons">
                                <ul>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i> {{$home['phone']}} </li>
                                    <li><i class="fa fa-envelope" aria-hidden="true"></i> {{$home['email']}}</li>
                                    
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-9">
                        <form enctype="multipart/form-data" class="w3f-form" role="form" id="w3n-submit-form" action="/site/form/submit/id/1608" method="post">
                            <div class="input  wow slideInUp" style="visibility: visible; animation-name: slideInUp;">

                                <input class="" placeholder="Tên của bạn*" type="text" value="" name="W3NF[9819][c21]" id="W3NF_9819_c21">
                                <div class="errorMessage" id="AutoForm_c21_em_" style="display:none"></div>

                                <input class="" placeholder="Email của bạn*" type="text" value="" name="W3NF[9824][c343]" id="W3NF_9824_c343">
                                <div class="errorMessage" id="AutoForm_c343_em_" style="display:none"></div>

                                <input class="" placeholder="Số điện thoại*" type="text" value="" name="W3NF[9820][c143]" id="W3NF_9820_c143">
                                <div class="errorMessage" id="AutoForm_c143_em_" style="display:none"></div>

                                <input class="" placeholder="Chủ đề*" type="text" value="" name="W3NF[9823][c281]" id="W3NF_9823_c281">
                                <div class="errorMessage" id="AutoForm_c281_em_" style="display:none"></div>
                            </div>
                            <div class="textarea  wow slideInRight" style="visibility: visible; animation-name: slideInRight;">

                                <textarea class="" placeholder="Nhập câu hỏi tại đây*" name="W3NF[9821][c225]" id="W3NF_9821_c225"></textarea>
                                <div class="errorMessage" id="AutoForm_c225_em_" style="display:none"></div>

                                <input class="hover-mo submit" id="submit" type="submit" id="submit" name="yt0" value="Gửi tin nhắn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	$('#submit').on('click',function(e){ 
		e.preventDefault();
	    if($('#W3NF_9819_c21').val() == '' || $('#W3NF_9824_c343').val() == '' || $('#W3NF_9820_c143').val() == '' || $('#W3NF_9823_c281').val() == '' || $('#W3NF_9821_c225').val() == ''){
	        $.notify({
	              icon: 'pe-7s-gift',
	              message: "Vui lòng nhập đầy đủ thông tin ở form"

	              },{
	            type: 'danger',
	            timer: 4000
	        });
	    }else{
	     $.ajax({
	        url : '{{route('contact_post')}}',
	        type : 'POST',
	        data : {
	            fullname : $('#W3NF_9819_c21').val(),
	            email : $('#W3NF_9824_c343').val(),
	            phone : $('#W3NF_9820_c143').val(),
	            category : $('#W3NF_9823_c281').val(),
	            question : $('#W3NF_9821_c225').val(),
	            status : 0,
	            _token : '{{ csrf_token() }}'

	        },      
	    success : function (data){
	    	var data = JSON.parse(data);
	        if(data.status == 200){
	            $.notify({
	              icon: 'pe-7s-gift',
	              message: "Yêu cầu của bạn đang được gửi đi"

	              },{
	            type: 'success',
	            timer: 4000
	        });
	            $('form').hide();
	            $('#result').html('Yêu cầu của bạn đang được gửi đi và đang xử lí').fadeIn("slow");
	        }else{
	            $.notify({
	              icon: 'pe-7s-gift',
	              message: "Lỗi không xác định"

	              },{
	            type: 'danger',
	            timer: 4000
	        });
	        }
	        
	    }
	    });
	 }

	});
</script>
@endsection
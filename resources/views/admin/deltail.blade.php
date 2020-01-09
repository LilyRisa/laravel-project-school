@extends('admin.layout')

@section('page_title')
  @include('admin.component.page_title',['title'=> 'Home options'])
@endsection
@section('breadcrumb')
	@include('admin.component.breadcrumb',['count' => 2, 'title1' => 'home' ,'title2' => 'detail'])
@endsection

@section('content')
<section class="content">
	<div class="container-fluid">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="card card-default">
    				<div class="card-header">
    					<h3 class="card-title">Home options</h3>
    				</div>
    				<div class="card-body">
    					<div class="row">
    						<div class="col-6">
	    						<div class="form-group">
	    							<label for="name">Name</label>
	    							<input type="text" id="name" class="form-control" value="{{$detail['name']}}">
	    						</div>
	    					</div>
	    					<div class="col-6">
	    						<div class="form-group">
	    							<label for="phone">phone</label>
	    							<input type="text" id="phone" class="form-control" value="{{$detail['phone']}}">
	    						</div>
	    					</div>
    					</div>
    					<div class="row">
    						<div class="col-6">
	    						<div class="form-group">
	    							<label for="email">email</label>
	    							<input type="text" id="email" class="form-control" value="{{$detail['email']}}">
	    						</div>
	    					</div>
	    					<div class="col-6">
	    						<div class="form-group">
	    							<label for="address">address</label>
	    							<input type="text" id="address" class="form-control" value="{{$detail['address']}}">
	    						</div>
	    					</div>
    					</div>
    					<div class="row">
    						<div class="col-6">
	    						<div class="form-group">
	    							<label for="contentText">contentText</label>
	    							<textarea name="" id="contentText" class="form-control">{{$detail['contentText']}}</textarea>
	    						</div>
	    					</div>
	    					<div class="col-6">
	    						<div class="form-group">
		    						<label for="keyword">keyword</label>
		    						<textarea name="" id="keyword" class="form-control">{{$detail['keyword']}}</textarea>
		    					</div>
	    					</div>
    					</div>
    					<div class="row">
    						<div class="col-6">
	    						<div class="form-group">
	    							<label for="recommend">recommend</label>
	    							<input type="text" id="recommend" class="form-control" value="{{$detail['recommend']}}">
	    						</div>
	    					</div>
	    					<div class="col-6">
	    						<div class="form-group">
	    							<label for="description">description</label>
	    							<input type="text" id="description" class="form-control" value="{{$detail['description']}}">
	    						</div>
	    					</div>
    					</div>
    					<div class="row">
    						<div class="col-6">
    							<div class="form-group">
    								<label for="logo">logoSite</label>
    								<input type="file" class="form-control" id="logo">
    								<img style="width:100px;height:100px;object-fit: cover" id="preview_image" src="{{asset('images')}}/{{$detail['logoSite']}}"/>
	            					 <i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>
	            					<input type="text" id="logoSite" value="{{$detail['logoSite']}}" hidden>
    							</div>
    						</div>
    						<div class="col-6">
	    						<div class="form-group">
	    							<label for="mapIframe">mapIframe</label>
	    							<textarea id="mapIframe" class="form-control">{{$detail['mapIframe']}}</textarea>
	    						</div>
	    					</div>
    					</div>
    					<div class="row">
    						<div class="col-6">
	    						<div class="form-group">
	    							<label for="linkFB">linkFB</label>
	    							<input type="text" id="linkFB" class="form-control" value="{{$detail['linkFB']}}">
	    						</div>
	    					</div>
	    					<div class="col-6">
	    						<div class="form-group">
	    							<label for="linkTW">linkTW</label>
	    							<input type="text" id="linkTW" class="form-control" value="{{$detail['linkTW']}}">
	    						</div>
	    					</div>
    					</div>
    					<div class="row">
    						<button class="btn btn-success" type="submit" id="edit">Edit</button>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</section>
<script>
	window.onload = function(){
		$('#logo').on('change', function(){
		if ($(this).val() != '') {
    		upload(this);

		}
	});

		$('#edit').on('click',function(e){
			e.preventDefault();
			console.log('asdasdsad');
			if($('#name').val() != '' && $('#phone').val() != '' && $('#email').val() != '' && $('#address').val() != '' && $('#contentText').val() != '' && $('#keyword').val() != '' && $('#recommend').val() != '' && $('#description').val() != '' && $('#logoSite').val() != '' && $('#mapIframe').val() != '' && $('#linkFB').val() != '' && $('#linkTW').val() != ''){

				var form_data = new FormData();
				form_data.append('name', $('#name').val());
				form_data.append('phone', $('#phone').val());
				form_data.append('email', $('#email').val());
				form_data.append('address', $('#address').val());
				form_data.append('contentText', $('#contentText').val());
				form_data.append('keyword', $('#keyword').val());
				form_data.append('recommend', $('#recommend').val());
				form_data.append('description', $('#description').val());
				form_data.append('logoSite', $('#logoSite').val());
				form_data.append('mapIframe', $('#mapIframe').val());
				form_data.append('linkFB', $('#linkFB').val());
				form_data.append('linkTW', $('#linkTW').val());
				form_data.append('_token', '{{ csrf_token() }}');

				$.ajax({
					url: '{{route('detail_edit',['id' => $detail['id']])}}',
					type: 'POST',
					data: form_data,
					contentType: false,
            		processData: false,
            		success: function(data){
            			console.log(data);
	    				var data = JSON.parse(data);
	    				if(data.status == 200){
		            		$.notify({
				                icon: '',
				                message: data.messenges

				               },{
				                   type: 'success',
				                   timer: 2000
				               });
		            		setTimeout(function() {
	                                    eval('window.location.href = "{{ route('detail') }}"');
	                                },2000);
		            	}else{
		            		$.notify({
				                icon: '',
				                message: "Vui lòng kiểm tra các trường"

				               },{
				                   type: 'danger',
				                   timer: 2000
				               });
						}
            		},
            		error: function (xhr, status, error) {
                		console.log(xhr.responseText);
                
            		}
				});


			}else{
				$.notify({
                    icon: '',
                    message: 'Vui lòng kiểm tra các trường !'

                   },{
                       type: 'danger',
                       timer: 2000
                   });
			}
				
		});
			

	function upload(img) {
        var form_data = new FormData();
        form_data.append('file', img.files[0]);
        form_data.append('_token', '{{csrf_token()}}');
        $('#loading').css('display', 'block');
        $.ajax({
            url: "{{route('imgupload')}}",
            data: form_data,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function (data) {
            	var data = JSON.parse(data);
            	console.log(data)
                if (data.fail) {
                    $('#preview_image').attr('src', '{{asset('img/noimage.jpeg')}}');
                    console.log(data.errors['file']);
                }
                else {
                    $('#preview_image').attr('src', '{{asset('images')}}/' + data.success);
                    $('#logoSite').attr('value', data.success);
                    console.log(data.data);
                }
                $('#loading').css('display', 'none');
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
                
            }
        });
    }
	}
	
</script>
@endsection
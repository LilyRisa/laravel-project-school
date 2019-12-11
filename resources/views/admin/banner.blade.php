@extends('admin.layout')

@section('page_title')
  @include('admin.component.page_title',['title'=> 'Banner'])
@endsection
@section('breadcrumb')
	@include('admin.component.breadcrumb',['count'=> 2,'title1' => 'home','title2'=>'banner'])
@endsection

@section('content')
	<section class="content">
		<div class="container-fluid">
        	<div class="row">
        		<div class="col-md-6">
        			<div class="card card-primary">
        				<div class="card-header">
                			<h3 class="card-title">@if(isset($data)) Edit banner @else Add banner @endif</h3>
              			</div>
              			<div class="card-body">
              				<div class="row">
              				<div class="col-6">
              					<div class="form-group">
              						<label for="banner_name">Name banner</label>
              						@if(isset($data))
              						<input type="text" class="form-control" id="banner_name" value="{{$data['banner_name']}}">
              						@else
              						<input type="text" class="form-control" id="banner_name" placeholder="Name banner">
              						@endif
              					</div>
              					<div class="form-group">
              						<label for="banner_title">Title banner</label>
              						@if(isset($data))
              						<input type="text" class="form-control" id="banner_title" value="{{$data['banner_title']}}">
              						@else
              						<input type="text" class="form-control" id="banner_title" placeholder="Title banner">
              						@endif
              					</div>
              				</div>
              				<div class="col-6">
              					<div class="form-group">
              						<label for="user_id">User create</label>
              						<select class="form-control" name="" id="user_id" disabled="">
              							@if(isset($data))
              							<option value="{{$data['user_id']}}">
              								@foreach($user as $usr)
												@if($data['user_id'] == $usr->id)
												{{$usr->name}}
												@endif
              								@endforeach
              							</option>
              							@else
              							<option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
              							@endif
              						</select>
              					</div>
              					<div class="form-group">
              						<label for="img">Image</label>
              						<input type="file" id="img" class="form-control">
              						@if(isset($data))
              						@foreach($image as $img)
              						@if($img->id == $data['img_id'])
              						<img style="width: 200px; height:150px;object-fit: cover" id="preview_image" src="{{asset('/')}}{{$img->url}}"/>
              						@endif
              						@endforeach
              						<i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>
              						<input type="text" value="{{$data['img_id']}}" id="img_id" hidden="">
              						@else
              						<img style="width: 200px; height:150px;object-fit: cover" id="preview_image" src="{{asset('img/noimage.jpeg')}}"/>
              						<i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>
              						<input type="text" value="" id="img_id" hidden="">
              						@endif
              					</div>
              				</div>
              				</div>
              				<div class="row">
              					<button type="submit" class="btn btn-success" id="submit">@if(isset($data)) update @else submit @endif</button>
              				</div>
              			</div>
        			</div>
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-12">
        			<div class="card card-primary">
        				<div class="card-header">
        					<h3 class="card-title">List Teach</h3>
        				</div>
        				<div class="card-body">
        					<div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
        						<div class="row">
									<div class="col-sm-12 col-md-6"></div>
									<div class="col-sm-12 col-md-6"></div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<table id="example2" class="table table-bordered table-hover">
											<thead>
												<tr>
													<th>STT</th>
													<th>Name</th>
													<th>Title</th>
													<th>Image cover</th>
													<th>User</th>
													<th colspan="2">Action</th>

												</tr>
											</thead>
											<tbody>
												@foreach($banner as $bn)
												<tr>
													<td>{{$bn->banner_id}}</td>
													<td>{{$bn->banner_name}}</td>
													<td>{{$bn->banner_title}}</td>
													@foreach($image as $im)
													@if($bn->img_id == $im->id)
													<td><img src="{{asset('/')}}{{$im->url}}" alt="" style="width:150px;height: 150px;object-fit: cover"></td>
													@endif
													@endforeach
													@foreach($user as $usr)
													@if($bn->user_id == $usr->id)
													<td>{{$usr->name}}</td>
													@endif
													@endforeach
													<td><a href="{{route('banner_get_edit',['id' =>$bn->banner_id ])}}">Edit</a></td>
													<td><a href="#" onclick="del('{{route('banner_del',['id' => $bn->banner_id])}}')">Del</a></td>
												</tr>
												@endforeach
											</tbody>
											<tfoot>
												<tr>
													<th>STT</th>
													<th>Name</th>
													<th>Title</th>
													<th>Image cover</th>
													<th>User</th>
													<th>Edit</th>
													<th>Del</th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
    </section>
    <script>
		function del(e){
			
			swal({
	            title: 'Xác nhận xóa ?',
	            text: "Việc xóa sẽ không thể khôi phục lại. Nếu muốn khôi phục vui lòng liên hệ database admin",
	            type: 'warning',
	            showCancelButton: true,
	            confirmButtonText: 'Có',
	            cancelButtonText: 'Không',
	            confirmButtonClass: 'btn btn-success',
	            cancelButtonClass: 'btn btn-danger',
	            buttonsStyling: false
	        }).then(function (confirmed) {
	            //var id = $(__this).attr('class');
	            console.log(e);
				$.ajax({
					url: e,
					type: 'GET',
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
	                                    eval('window.location.href = "{{ route('banner') }}"');
	                                },2000);
						}else{
							$.notify({
				                icon: '',
				                message: data.messenges

				               },{
				                   type: 'success',
				                   timer: 2000
				               });
		            		setTimeout(function() {
	                                    eval('window.location.href = "{{ route('banner') }}"');
	                                },2000);
						}
					}
				});
	        }, function (dismiss) {

	        });
		}
    	window.onload = function(){
    		$('#submit').on('click',function(e){
    			e.preventDefault();
    			var form_data = new FormData();
    			if($('#banner_name').val() != '' && $('#banner_title').val() != '' && $('#img_id').val() != ''){

    				form_data.append('banner_name',$('#banner_name').val());
    				form_data.append('banner_title',$('#banner_title').val());
    				form_data.append('img_id',$('#img_id').val());
    				form_data.append('user_id',$('#user_id').val());
    				form_data.append('_token', '{{csrf_token()}}');
    				@if(isset($data))
    				$.ajax({
    					url: '{{route('banner_post_edit',['id' => $data['banner_id']])}}',
    					type: 'POST',
    					data:form_data,
    					contentType: false,
                    	processData: false,
                    	success: function(data){
                    		var data = JSON.parse(data);
			            	console.log(data);
			            	if(data.status == 200){
			            		$.notify({
					                icon: '',
					                message: data.messenges

					               },{
					                   type: 'success',
					                   timer: 2000
					               });
			            		setTimeout(function() {
	                                        eval('window.location.href = "{{ route('banner') }}"');
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
    				@else
    				$.ajax({
    					url: '{{route('banner_add')}}',
    					type: 'POST',
    					data:form_data,
    					contentType: false,
                    	processData: false,
                    	success: function(data){
                    		var data = JSON.parse(data);
			            	console.log(data);
			            	if(data.status == 200){
			            		$.notify({
					                icon: '',
					                message: data.messenges

					               },{
					                   type: 'success',
					                   timer: 2000
					               });
			            		setTimeout(function() {
	                                        eval('window.location.href = "{{ route('banner') }}"');
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
    				@endif
    			}else{
    				$.notify({
	                    icon: '',
	                    message: 'Vui lòng kiểm ta các trường!'

                    },{
                       type: 'success',
                       timer: 2000
                    });
    			}
    		});
    		$('#img').on('change',function(){
	    		if ($(this).val() != '') {
	            		upload(this);

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
		                    $('#file_name').val(data.success);
		                    $('#preview_image').attr('src', '{{asset('images')}}/' + data.success);
		                    $('#img_id').attr('value', data.data.id);
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
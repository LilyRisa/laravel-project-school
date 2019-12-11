@extends('admin.layout')

@section('page_title')
  @include('admin.component.page_title',['title'=> 'Teach'])
@endsection
@section('breadcrumb')
	@include('admin.component.breadcrumb',['count'=> 2,'title1' => 'home','title2'=>'teach'])
@endsection

@section('content')
	<section class="content">
		<div class="container-fluid">
        	<div class="row">
        		<div class="col-md-12">
        			<div class="card card-primary">
        				<div class="card-header">
        					@if(isset($data))
							<h3 class="card-title">Edit teach</h3>
        					@else
        					<h3 class="card-title">Add Teach</h3>
        					@endif
        				</div>
        				<div class="card-body">
        					<form action="">
        						<div class="row">
        							<div class="col-6">
		        						<div class="form-group">
		        							<label for="teach_name">Name</label>
		        							@if(isset($data))
		        							<input type="text" id="teach_name" class="form-control" value="{{$data['teach_name']}}">
		        							@else
		        							<input type="text" id="teach_name" class="form-control" placeholder="Teach name">
		        							@endif
		        						</div>
        							</div>
        							<div class="col-6">
        								<label for="teach_email">Email</label>
        								@if(isset($data))
										<input type="email" id="teach_email" class="form-control" value="{{$data['teach_email']}}">
        								@else
        								<input type="email" id="teach_email" class="form-control" placeholder="Email">
        								@endif
        							</div>
        						</div>
        						<div class="row">
        							<div class="col-6">
        								<div class="form-group">
        									<label for="teach_phone">Phone</label>
        									@if(isset($data))
											<input type="text" class="form-control" id="teach_phone" value="{{$data['teach_phone']}}">
        									@else
        									<input type="text" class="form-control" id="teach_phone" placeholder="Phone">
        									@endif
        								</div>
        							</div>
        							<div class="col-6">
        								<div class="form-group">
        									<label for="teach_facebook">Facebook</label>
        									@if(isset($data))
        									<input type="text" class="form-control" id="teach_facebook" value="{{$data['teach_facebook']}}">
        									@else
        									<input type="text" class="form-control" id="teach_facebook" placeholder="Facebook">
        									@endif
        								</div>
        							</div>
        						</div>
        						<div class="row">
        							<div class="col-6">
        								<div class="form-group">
        									<label for="teach_skype">Skype</label>
        									@if(isset($data))
        									<input type="text" class="form-control" id="teach_skype" value="{{$data['teach_skype']}}">
        									@else
        									<input type="text" class="form-control" id="teach_skype" placeholder="Skype">
        									@endif
        								</div>
        							</div>
        						</div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="teach_descriptions">Meta</label>
                                            @if(isset($data))
                                            <textarea id="meta" class="form-control">{{$data['meta']}}</textarea>
                                            @else
                                            <textarea id="meta" class="form-control"></textarea>
                                            @endif
                                        </div>
                                    </div>
                                </div>
        						<div class="row">
        							<div class="col-12">
        								<div class="form-group">
        									<label for="teach_descriptions">Description</label>
        									<textarea id="summernote"></textarea>
        								</div>
        							</div>
        						</div>
        						<div class="row">
        							<div class="form-group">
        								<label for="teach_avatar">Avatar</label>
        								<input type="file" id="avatar" class="form-control">
        								@if(isset($data))
        								<img width="50%" height="50%" style="object-fit: cover" id="preview_image" src="{{asset('/images')}}/{{$data['teach_avatar']}}"/>
        								<input type="text" value="{{$data['teach_avatar']}}" id="teach_avatar" class="form-control" hidden>
        								@else
        								<img width="50%" height="50%" style="object-fit: cover" id="preview_image" src="{{asset('img/noimage.jpeg')}}"/>
        								<input type="text" value="" id="teach_avatar" class="form-control" hidden>
        								@endif
        							</div>
        						</div>
        						<div class="row">
        							<button class="btn btn-success" id="submit">Submit</button>
        						</div>
        					</form>
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
													<th>Email</th>
													<th>Phone</th>
													<th>Facebook</th>
													<th>Skype</th>
													<th>Avatar </th>
													<th colspan="2">Action</th>

												</tr>
											</thead>
											<tbody>
												@foreach($teach as $tc)
												<tr>
													<td>{{$tc->id}}</td>
													<td>{{$tc->teach_name}}</td>
													<td><a href="mailto:{{$tc->teach_email}}">{{$tc->teach_email}}</a></td>
													<td><a href="tel:{{$tc->teach_phone}}">{{$tc->teach_phone}}</a></td>
													<td><a href="{{$tc->teach_facebook}}" target="blank">{{$tc->teach_facebook}}</a></td>
													<td><a href="skype:{{$tc->teach_skype}}">{{$tc->teach_skype}}</a></td>
													<td><img style="width:150px;height:150px; object-fit: cover" src="{{asset('/images')}}/{{$tc->teach_avatar}}" alt=""></td>
													<td><a href="{{route('teach_edit_get', ['id' =>$tc->id])}}">Edit</a></td>
													<td><a href="#" onclick="del('{{route('teach_del',['id' => $tc->id])}}')">Del</a></td>
												</tr>
												@endforeach
											</tbody>
											<tfoot>
												<tr>
													<th>STT</th>
													<th>Name</th>
													<th>Email</th>
													<th>Phone</th>
													<th>Facebook</th>
													<th>Skype</th>
													<th>Avatar</th>
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
	                                    eval('window.location.href = "{{ route('teach') }}"');
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
	                                    eval('window.location.href = "{{ route('teach') }}"');
	                                },2000);
						}
					}
				});
	        }, function (dismiss) {

	        });
		}
    	window.onload = function(){
    		@if(isset($data))
            var html = `{!!$data['teach_descriptions']!!}`;
            $('#summernote').summernote('pasteHTML', html);
            @else
			$('#summernote').summernote({
		        placeholder: `Hello stand alone ui`,
		        tabsize: 2,
		        height: 400
		      });
			@endif
    		$('#avatar').on('change',function(){
    			if ($(this).val() != '') {
            		upload(this);

       			}
    		});
    		function upload(img){
    			//console.log('dasdad')
    			var form_img = new FormData();
    			form_img.append('file', img.files[0]);
        		form_img.append('_token', '{{csrf_token()}}');
    			$.ajax({
    					url: '{{route('imgupload')}}',
    					type: 'POST',
    					data: form_img,
    					contentType: false,
            			processData: false,
            			success: function(data){
            				console.log(data);
            				var data = JSON.parse(data);
            				$('#teach_avatar').attr('value',data.success);
            				$('#preview_image').attr('src','{{asset('images')}}/' + data.success);

            			},
            			error: function (xhr, status, error) {
			                console.log(xhr.responseText);
			                
			            }

    			});
    		}
    		$('#submit').on('click',function(e){
    			e.preventDefault();
    			var form_data = new FormData();
    			if($('#teach_name').val() != '' && $('#teach_email').val() != '' && $('#teach_phone').val() != '' && $('#teach_facebook').val() != '' && $('#teach_skype').val() != '' && $('#teach_avatar').val() != ''){

    				// var img = $('#teach_avatar');
    				// form_data.append('file', img.files[0]);

    				form_data.append('teach_name',$('#teach_name').val());
    				form_data.append('teach_email',$('#teach_email').val());
    				form_data.append('teach_phone',$('#teach_phone').val());
    				form_data.append('teach_facebook',$('#teach_facebook').val());
    				form_data.append('teach_skype',$('#teach_skype').val());
    				form_data.append('teach_avatar',$('#teach_avatar').val());
                    form_data.append('meta',$('#meta').val());
    				form_data.append('teach_descriptions',$('#summernote').summernote('code'));
    				form_data.append('_token', '{{csrf_token()}}');
    				@if(isset($data))
    				$.ajax({
    					url: '{{route('teach_edit_post',['id' => $data['id']])}}',
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
	                                        eval('window.location.href = "{{ route('teach') }}"');
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
    					url: '{{route('teach_add')}}',
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
	                                        eval('window.location.href = "{{ route('teach') }}"');
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
                        message: 'Vui lòng kiểm tra các trường !'

                       },{
                           type: 'danger',
                           timer: 2000
                       });
    			}
    		});
    	}
    	
    </script>
@endsection
@extends('admin.layout')

@section('page_title')
  @include('admin.component.page_title',['title'=> 'Blog'])
@endsection
@section('breadcrumb')
	@include('admin.component.breadcrumb',['count'=> 2,'title1' => 'home','title2'=>'blog'])
@endsection

@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				
			
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Write blog</h3>
				</div>
				<div class="card-tools">
              		<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              		<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            	</div>
            	<div class="card-body">
            		<form action="" method="post" id="imgUploader">          		
            		@csrf
            		<div class="row">
            			<div class="col-md-6">
            				<div class="form-group">
            					<label for="blog_title">Title</label>
                                @if(isset($blog))
            					<input class="form-control" type="text" name="title" id="blog_title" name="blog_title" value="{{$blog['blog_title']}}">
                                @else
                                <input class="form-control" type="text" name="title" id="blog_title" name="blog_title" placeholder="blog title">
                                @endif
            				</div>
            				<div class="form-group">
            					<label for="category">Category</label>
            					<select name="category" id="category" class="form-control">
            						@foreach($category as $ct)
                                        @if(isset($blog) && $blog['category_child_id'] == $ct->id)
                                        <option value="{{$ct->id}}" selected>{{$ct->name}}</option>
                                        @else
            							<option value="{{$ct->id}}">{{$ct->name}}</option>
                                        @endif
            						@endforeach
            					</select>
            				</div>
            			</div>
            			<div class="col-md-6">
            				<div class="form-group">
            					<label for="user">User</label>
            					<select id="user" class="form-control" name="" disabled="">
                                    @if(isset($blog))
                                        @foreach($user as $usr)
                                            @if($blog['user_id'] == $usr->id)
                                    <option value="{{$usr->id}}">{{$usr->name}}</option>
                                            @endif
                                        @endforeach
                                    @else
                                    <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                                    @endif
            					</select>
            				</div>
            				
            			</div>
            		</div>
            		<div class="row">
            			<div class="col-md-6">

            				<label for="img">Image cover</label>
            					<input type="file" name="img" id="img" class="form-control">
                                @if(isset($blog))
                                <img width="50%" height="50%" style="object-fit: cover" id="preview_image" src="
                                @foreach($image as $im)
                                @if($blog['img_id'] == $im->id)
                                {{asset('/')}}{{$im->url}}
                                @endif
                                @endforeach
                                "/>
                                 <i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>
                                <input type="text" name="img_id" id="img_id" value="" hidden>
                                @else
            					<img width="50%" height="50%" style="object-fit: cover" id="preview_image" src="{{asset('img/noimage.jpeg')}}"/>
            					 <i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw" style="position: absolute;left: 40%;top: 40%;display: none"></i>
            					<input type="text" name="img_id" id="img_id" value="" hidden>
                                @endif
            			</div>
            		</div>
            		<div class="row">
            			<div class="col-md-6">
            				<div class="form-group">
            					<label for="blog_meta">Meta description</label>
                                @if(isset($blog))
                                <textarea name="blog_meta" id="blog_meta" class="form-control" maxlength="100000">{{$blog['blog_meta']}}</textarea>
                                @else
            					<textarea name="blog_meta" id="blog_meta" class="form-control" maxlength="100000"></textarea>
                                @endif
            				</div>
            			</div>
            		</div>
            		<div class="row">
            			<div class="col-md-12">
            				<div class="form-group">
            					<label for="body">Content</label>
            					<textarea name="blog_body" id="summernote" ></textarea>
            				</div>
            			</div>
            		</div>
            		<div class="row">
                        @if(isset($blog))
                        <button type="submit" id="submit" class="btn btn-success">Update</button>
                        @else
            			<button type="submit" id="submit" class="btn btn-success">Submit</button>
                        @endif
            		</div>

            		</form>
            	</div>
            	</div>
		</div>
	</div>

	<script>
		window.onload = function(){
            @if(isset($blog))
            var html = `{!!$blog['blog_body']!!}`;
            $('#summernote').summernote('pasteHTML', html);
            @else
			$('#summernote').summernote({
		        placeholder: `Hello stand alone ui`,
		        tabsize: 2,
		        height: 400
		      });
			@endif
			$('#submit').on('click',function(e){
				e.preventDefault();
                @if(isset($blog))
            var form_data = new FormData();
            if($('#blog_title').val() != null && $('#category').val() != null && $('#blog_meta').val() != null){
                form_data.append('blog_title', $('#blog_title').val());
                form_data.append('category', $('#category').val());
                if($('#img_id').val() != null && $('#img_id').val() != ''){
                    form_data.append('img_id', $('#img_id').val());
                }
                form_data.append('blog_meta', $('#blog_meta').val());
                form_data.append('body', $('#summernote').summernote('code'));
                form_data.append('_token', '{{csrf_token()}}');

                $.ajax({
                    url: "{{route('blog_update_post',['id' => $blog['blog_id']])}}",
                    data: form_data,
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    success: function (data) {
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
                                        eval('window.location.href = "{{ route('blog_list') }}"');
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
                    message: "Vui lòng kiểm tra các trường"

                   },{
                       type: 'danger',
                       timer: 2000
                   });
            }
                @else
			if($('#blog_title').val() != null && $('#category').val() != null && $('#img_id').val() != null && $('#blog_meta').val() != null){
				var form_data = new FormData();
				form_data.append('blog_title', $('#blog_title').val());
				form_data.append('category', $('#category').val());
				form_data.append('user', $('#user').val());
				form_data.append('img_id', $('#img_id').val());
				form_data.append('blog_meta', $('#blog_meta').val());
				form_data.append('body', $('#summernote').summernote('code'));
				form_data.append('user', '{{Auth::user()->id}}');
				form_data.append('_token', '{{csrf_token()}}');

				 console.log($('.note-editable .card-block').find('*'));
				$.ajax({
 		           	url: "{{route('blog_add')}}",
		            data: form_data,
		            type: 'POST',
		            contentType: false,
		            processData: false,
		            success: function (data) {
		            	var data = JSON.parse(data);
		            	console.log(data);
		            	if(data.status == 200){
		            		$.notify({
				                icon: '',
				                message: data.messeges

				               },{
				                   type: 'success',
				                   timer: 2000
				               });
		            		setTimeout(function() {
                                        eval('window.location.href = "{{ route('blog') }}"');
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
                message: "Vui lòng kiểm tra các trường"

               },{
                   type: 'danger',
                   timer: 2000
               });
			}
            @endif
			// console.log(data);
			
			


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
</section>
@endsection
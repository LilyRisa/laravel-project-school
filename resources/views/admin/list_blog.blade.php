@extends('admin.layout')

@section('page_title')
  @include('admin.component.page_title',['title'=> 'List Blog'])
@endsection
@section('breadcrumb')
	@include('admin.component.breadcrumb',['count'=> 2,'title1' => 'home','title2'=>'blog', 'title3' => 'blog_list'])
@endsection

@section('content')

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">List Blog</h3>
				</div>
				<div class="card-body">
					<a href="{{route('blog_add')}}"><button class="btn btn-primary">Write blog</button></a>
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
											<th>Blog title</th>
											<th>Meta</th>
											<th>User create</th>
											<th>Image cover</th>
											<th>On category</th>
											<th colspan="2">Action</th>

										</tr>
									</thead>
									<tbody>
										@foreach($blog as $bl)
										<tr >
											<td>{{$bl->blog_id}}</td>
											<td>{{$bl->blog_title}}</td>
											<td>{{$bl->blog_meta}}</td>
											<td>
												@foreach($user as $usr)
													@if($usr->id == $bl->user_id)
													{{$usr->name}}
													@endif
												@endforeach
											</td>
											<td>
											@foreach($image as $im)
												@if($im->id == $bl->img_id)
												<img src="{{asset('/')}}{{$im->url}}" style="width:150px;height:150px;object-fit: cover" alt="">
												@endif
											@endforeach
											</td>
											<td>@foreach($category as $ct)
												@if($ct->id == $bl->category_child_id)
												{{$ct->name}}
												@endif
											@endforeach</td>
											<td><a href="{{route('blog_update_get',['id' => $bl->blog_id])}}">Edit</a></td>
											<td><a class="delblog" href="#" data-link="{{route('blog_del',['id' => $bl->blog_id])}}" onclick="del('{{route('blog_del',['id' => $bl->blog_id])}}')">Del</a></td>
										</tr>
										@endforeach
									</tbody>
									<tfoot>
										<th>Rendering &reg;</th>
										<th>Title</th>
										<th>Meta</th>
										<th>User</th>
										<th>Cover</th>
										<th>Category</th>
										<th>Edit</th>
										<th>Delete</th>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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
				                message: data.messeges

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
				                message: data.messeges

				               },{
				                   type: 'success',
				                   timer: 2000
				               });
		            		setTimeout(function() {
	                                    eval('window.location.href = "{{ route('blog_list') }}"');
	                                },2000);
						}
					}
				});
	        }, function (dismiss) {

	        });
		}
		window.onload = function(){
			$(document).ready(function(){
			
			});
		}
	</script>
@endsection



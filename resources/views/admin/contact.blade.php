@extends('admin.layout')

@section('page_title')
  @include('admin.component.page_title',['title'=> 'Category child'])
@endsection
@section('breadcrumb')
	@include('admin.component.breadcrumb',['count' => 2, 'title1' => 'home' , 'title2' => 'contact'])
@endsection

@section('content')
<section class="content">
	<div class="container-fluid">
        <div class="row">
        	<div class="col-12">
        		<div class="card card-default">
        			<div class="card-header">
        				<h3 class="card-title">Contact</h3>
        			</div>
        			<div class="card-body">
        				<table class="table table-hover">
        					<thead>
        						<tr>
        							<th>STT</th>
        							<th>Full name</th>
        							<th>Email</th>
        							<th>Phone</th>
        							<th>Category</th>
        							<th>Question</th>
        							<th>Time</th>
        							<th colspan="2">Action</th>
        						</tr>
        					</thead>
        					<tbody>
        						@foreach($contact as $ct)
        						<tr>
        							@if($ct->status == 1)
        							<td><i class="fas fa-eye"></i> {{$ct->id}} </td>
        							@else
        							<td><i class="fas fa-eye-slash"></i> {{$ct->id}} </td>
        							@endif
        							<td>{{$ct->fullname}}</td>
        							<td>{{$ct->email}}</td>
        							<td>{{$ct->phone}}</td>
        							<td>{{$ct->category}}</td>
        							<td>{{$ct->question}}</td>
        							<td>{{$ct->created_at}}</td>
        							@if($ct->status == 0)
        							<td><a href="#" id="confirm" data-id="{{route('contact_confirm',['id' => $ct->id])}}">Confirm</a></td>
        							@else
        							<td><a href="#" id="del" data-id="{{route('contact_del',['id'=>$ct->id])}}">Delete</a></td>
        							@endif
        						</tr>
        						@endforeach
        					</tbody>
        				</table>
        			</div>
        		</div>
        	</div>
        </div>
    </div>
</section>
<script>
	window.onload = function(){
		$('#confirm').on('click',function(){
			var id = $(this).attr('data-id');
			swal({
                title: 'Xác nhận ?',
                text: "Bạn đã đọc !",
                type: 'success',
                showCancelButton: true,
                confirmButtonText: 'Có',
                cancelButtonText: 'Không',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function (confirmed) {
                if (!confirmed.dismiss)
                	$.ajax({
						url: id,
						type: 'GET',
						success: function(data){
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
		                                    eval('window.location.href = "{{ route('contact') }}"');
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
                  
            }, function (dismiss) {

            });


			
			
		});

		$('#del').on('click',function(){
			var id = $(this).attr('data-id');
			swal({
                title: 'Xác nhận xóa ?',
                text: "Xóa sẽ không thể phục hồi, vui lòng liên hệ database admin để tìm cách khôi phục !",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Có',
                cancelButtonText: 'Không',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function (confirmed) {
                if (!confirmed.dismiss)
                    $.ajax({
                        url: id,
                        method: 'GET',
                        success: function(resp){
                            swal(
                                'ok!',
                                'Your has been delete.',
                                'success'
                            );
                                setTimeout(function(){
                                    location.reload();
                                }, 1000);
                        }
                    });
            }, function (dismiss) {

            });
		});
	}
	
	
</script>

@endsection
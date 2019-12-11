@extends('admin.layout')

@section('page_title')
  @include('admin.component.page_title',['title'=> 'Home options'])
@endsection
@section('breadcrumb')
	@include('admin.component.breadcrumb',['count' => 2, 'title1' => 'home' ,'title2' => 'findteach'])
@endsection

@section('content')
<section class="content">
	<div class="container-fluid">
        <div class="row">
        	<div class="col-12">
        		<div class="card card-default">
        			<div class="card-header">
        				<h3 class="card-title">Find Teach</h3>
        			</div>
        			<div class="card-body">
        				<table class="table table-hover">
        					<thead>
        						<tr>
        							<th>STT</th>
        							<th>Full name</th>
        							<th>Address</th>
        							<th>Phone</th>
        							<th>Email</th>
        							<th>Class</th>
        							<th>School</th>
        							<th>Gender</th>
        							<th>Learning</th>
        							<th>Subject</th>
        							<th>Count</th>
        							<th>purpose</th>
        							<th>Question</th>
        							<th>created_at</th>
        							<th>Action</th>
        						</tr>
        					</thead>
        					<tbody>
        						@foreach($fteach as $ct)
        						<tr>
        							@if($ct->status == 1)
        							<td><i class="fas fa-eye"></i> {{$ct->id}} </td>
        							@else
        							<td><i class="fas fa-eye-slash"></i> {{$ct->id}} </td>
        							@endif
        							<td>{{$ct->fullname}}</td>
        							<td>{{$ct->address}}</td>
        							<td>{{$ct->phone}}</td>
        							<td>{{$ct->email}}</td>
        							<td>{{$ct->stclass}}</td>
        							<td>{{$ct->school}}</td>
        							<td>{{$ct->sex}}</td>
        							<td>{{$ct->learning}}</td>
        							<td>{{$ct->subject}}</td>
        							<td>{{$ct->sl}}</td>
        							<td>{{$ct->purpose}}</td>
        							<td>{{$ct->ask}}</td>
        							<td>{{$ct->created_at}}</td>
        							@if($ct->status == 0)
        							<td><a href="#" class="confirm" data-id="{{route('findteach_confirm',['id' => $ct->id])}}">Confirm</a></td>
        							@else
        							<td><a href="#" class="del" data-id="{{route('findteach_del',['id'=>$ct->id])}}">Delete</a></td>
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
		$('.confirm').on('click',function(){
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
		                                    eval('window.location.href = "{{ route('findteach') }}"');
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

		$('.del').on('click',function(){
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
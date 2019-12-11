@extends('admin.layout')

@section('page_title')
  @include('admin.component.page_title',['title'=> 'Category'])
@endsection
@section('breadcrumb')
	@include('admin.component.breadcrumb',['count' => 2, 'title1' => 'home' , 'title2' => 'category'])
@endsection

@section('content')
	<section class="content">
		<div class="container-fluid">
        <div class="row">
        
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">@if(isset($data)) Edit category @else Add category @endif</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form role="form" action="@if(isset($data))
              	{{ route('category_edit_post',['id'=>$data['id']]) }}
              @else
              	{{ route('category_add') }}
              @endif
              " method="post">
              	@csrf
              	@if (session('status'))
        			<ul>
             			<li class="text-success"> {{ session('status') }}</li>
         			</ul>
     			@endif
                <div class="card-body">
                  <div class="form-group">
                    <label for="category">Name category</label>
                    <input type="text" class="form-control" id="category" name="name" 
                    @if(isset($data))
                    	value="{{$data['name']}}"
                    @else
                    	placeholder="name category"
                    @endif
                    >
                  </div>
                  <div class="form-group">
                    <label for="keyword">Keyword</label>
                    <input type="text" class="form-control" id="keyword" name="keyword" 
                    @if(isset($data))
                    	value="{{$data['keyword']}}"
                    @else
                    	placeholder="keyword category"
                    @endif
                    >
                  </div>
                 
                  <div class="form-check">
                  	@if(isset($data))
                    	<input type="checkbox" class="form-check-input" value="1" name="status" id="status">
                    @else
                    	<input type="checkbox" class="form-check-input" value="1" name="status" id="status">
                    @endif
                    
                    <label class="form-check-label" for="status">show category</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
         
            <!-- /.card -->

          </div>


          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">List category</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              
                <table id="tablecategory" class="table table-bordered table-hover">
                	<caption>List category</caption>
                	<thead>
                		<tr>
                			<th>Stt</th>
                			<th>Name category</th>
                			<th>Keyword category</th>
                			<th>status</th>
                			<th colspan="2">action</th>
                		</tr>
                	</thead>
                	<tbody>
                		@foreach($category as $ct)
                		<tr>
                			<td>{{$ct->id}}</td>
                			<td>{{$ct->name}}</td>
                			<td>{{$ct->keyword}}</td>
                			<td>{{$ct->status}}</td>
                			<td><a href="{{route('category_edit',['id'=>$ct->id])}}" >Edit</a></td>
                			<td><a class="del" href="javascript:void(0)" data-id="{{ route('category_del', ['id'=>$ct->id]) }}">Del</a></td>
                		</tr>
                		@endforeach
                	</tbody>
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Custom Elements</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">


                  

                 
                  
                  
                  
                  
                  <div class="form-group">
                    <label for="customRange1">Custom range (custom-range-teal)</label>
                   
                    	<p>
    					<b>R</b>
    						<input type="range" class="custom-range custom-range-teal" value="" data-slider-min="0" data-slider-max="255" data-slider-step="1" data-slider-value="128" data-slider-id="RC" id="R" data-slider-tooltip="hide" data-slider-handle="square" />
						</p>
						<p>
    						<b>G</b>
    						<input type="range" class="custom-range custom-range-teal" value="" data-slider-min="0" data-slider-max="255" data-slider-step="1" data-slider-value="128" data-slider-id="GC" id="G" data-slider-tooltip="hide" data-slider-handle="round" />
						</p>
						<p>
    						<b>B</b>
    						<input type="range" class="custom-range custom-range-teal" value="" data-slider-min="0" data-slider-max="255" data-slider-step="1" data-slider-value="128" data-slider-id="BC" id="B" data-slider-tooltip="hide" data-slider-handle="triangle" />
						</p>
                  </div>
                  
                  <div class="form-group">
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div>
	</section>
	<script>
	window.onload = function() {
		$(document).ready(function(){
			$('.del').on('click',function(){
				var id = $(this).attr('data-id');
				swal({
                    title: 'Xác nhận xóa ?',
                    text: "Xóa sẽ ảnh hưởng đến tất cả các category con và bài tin liên quan ",
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
		});
	}
		
	</script>

@endsection
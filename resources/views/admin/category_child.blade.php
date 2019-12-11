@extends('admin.layout')

@section('page_title')
  @include('admin.component.page_title',['title'=> 'Category child'])
@endsection
@section('breadcrumb')
	@include('admin.component.breadcrumb',['count' => 2, 'title1' => 'home' , 'title2' => 'category_child'])
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
                
                <h3 class="card-title">@if(isset($data)) Edit category 2nd @else Add category 2nd @endif</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="@if(isset($data))
              	{{ route('category_edit_post',['id'=>$data['id']]) }}
              @else
              	{{ route('category_child_add') }}
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
                    <label for="category">Name category 2nd</label>
                    <input type="text" class="form-control" id="category" name="name" 
                    @if(isset($data))
                    	value="{{$data['name']}}"
                    @else
                    	placeholder="name category"
                    @endif
                    >
                  </div>
                  <div class="form-group">
                    <label for="category">On the category</label>
                    <select name="category_id" class="form-control">
                      @foreach($last_ct as $last)
                        @if(isset($data))
                          @if($last->id == $data['category_id'])
                            <option value="{{$last->id}}" selected>{{$last->name}}</option>
                          @else
                            <option value="{{$last->id}}" >{{$last->name}}</option>
                          @endif
                        @else
                          <option value="{{$last->id}}">{{$last->name}}</option>
                        @endif
                      @endforeach
                    </select>
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
            <div class="card text-white bg-info">
              <div class="card-header"> 
                  <h3 class="card-title">Tree category</h3>
              </div>
              <div class="card-body">
                <div class="tree ">
    <ul>

        <li><span><a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#Web" aria-expanded="true" aria-controls="Web"><i class="collapsed"><i class="fas fa-folder"></i></i>
<i class="expanded"><i class="far fa-folder-open"></i></i> Web</a></span>
            <div id="Web" class="collapse show">
                <ul>
                  @foreach($last_ct as $p1)
                    <li><span><a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#page1" aria-expanded="false" aria-controls="page1"><i class="collapsed"><i class="fas fa-folder"></i></i>
<i class="expanded"><i class="far fa-folder-open"></i></i> {{$p1->name}}</a></span>
                        <ul>
                            <div id="page1" class="collapse">
                              @foreach($category_child as $p2)
                                @if($p2->category_id == $p1->id)
                                  <li><span><i class="far fa-file"></i><a href="{{route('category_child_edit',['id'=>$p2->id])}}"> {{$p2->name}}</a></span></li>
                                @endif
                              @endforeach
                            </div>
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
        </li>
    </ul>

</div>
              </div>
            </div>
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
                			<th>Name category 2nd</th>
                      <th>on the category</th>
                			<th>Keyword category</th>
                			<th>status</th>
                			<th colspan="2">action</th>
                		</tr>
                	</thead>
                	<tbody>
                		@foreach($category_child as $ct)
                  
                		<tr>
                			<td>{{$ct->id}}</td>
                			<td>{{$ct->name}}</td>
                      
                        @foreach($last_ct as $ctafter )
                        @if($ct->category_id == $ctafter->id)
                          <td><a href="{{ route('category_edit',['id'=>$ctafter->id]) }}" title="">{{$ctafter->name}}</a></td>
                        @endif
                        @endforeach

                      
                      <td>{{$ct->keyword}}</td>
                      <td>{{$ct->status}}</td>
                      <td><a href="{{ route('category_child_edit',['id'=>$ct->id]) }}" >Edit</a></td>
                      <td><a class="del" href="javascript:void(0)" data-id="{{ route('category_child_del', ['id'=>$ct->id]) }}">Del</a></td>
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
                    text: "Xóa sẽ ảnh hưởng đến tất cả các bài tin liên quan ",
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
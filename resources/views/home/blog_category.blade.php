@extends('home.layout')

@section('content')
<style type="text/css">.dmca {margin-top: 20px;}</style>
<img src="/images/no-image.png" width="0" height="0" style="width: 0; height: 0; display: none;" rel="nofollow" alt="Thong ke" data-src="/thong-ke.jpg">
<div id="row-1" class="row-xkld-1 wow slideInUp  animated" style="visibility: visible; animation-name: slideInUp;">
	<div class="container">
		<div class="list-news">
			{{-- //item --}}
			@foreach($blog as $bl)
			<div class="item ">
			    <div class="row">
			        <div class="img col-md-4">
			            <a href="{{route('blog_item',['id' => $bl->blog_id])}}">
			            	@foreach($images as $im)
			            	@if($im->id == $bl->img_id)
			                <img class="img-responsive" src="{{asset('/')}}/{{$im->url}}">
			                @endif
							@endforeach
			            </a>
			        </div>
			        <div class="content col-md-8">
			            <h4><a href="{{route('blog_item',['id' => $bl->blog_id])}}">{{$bl->blog_title}}</a></h4>
			            <div class="chat-add">
			                <div class="chat">
			                    <i class="fa fa-clock-o" aria-hidden="true"></i>
			                    <span>{{$bl->created_at}}</span>
			                </div>
			               
			            </div>
			            <div class="des-news">
			               {{$bl->blog_meta}}
			            </div>
			            <a href="{{route('blog_item',['id' => $bl->blog_id])}}">
			                <span class="hover-mo">Xem chi tiết <i class="fa fa-angle-right" aria-hidden="true"></i></span>
			            </a>
			        </div>
			    </div>
			</div>
			@endforeach
			
		</div>
	</div>
</div>

@endsection
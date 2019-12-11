@extends('home.layout')

@section('content')
<style type="text/css">.dmca {margin-top: 20px;}</style>
<img src="/images/no-image.png" width="0" height="0" style="width: 0; height: 0; display: none;" rel="nofollow" alt="Thong ke" data-src="/thong-ke.jpg">
<div id="row-1" class="row-1 wow slideInUp  animated" style="visibility: visible; animation-name: slideInUp;">
	<div class="container">
		<div class="title wow bounce" style="visibility: visible; animation-name: bounce;">
		    <center>
		        <h1>{{$blog['blog_title']}}</h1>
		        <p>Create at: {{$blog['created_at']}}</p>
		        <div class="gach-left"></div>
		        <div class="gach-right"></div>
		    </center>
		</div>
		<div class="content content-detail-text">
			{!! $blog['blog_body'] !!}
		</div>
		<div class="news-relate inpage">
		</div>

	</div>
</div>


@endsection
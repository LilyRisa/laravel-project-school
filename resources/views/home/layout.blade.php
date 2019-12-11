<?php
use Illuminate\Support\Facades\DB;
use App\category;
use App\category_child;
use App\Banner;
use App\Images;
use App\teach;

$home = DB::table('homedetail')->where('id','=',1)->get();
$home = $home[0];

$category = category::all();
$category_child = category_child::all();

$banner = Banner::all();
$image = Images::all();
$teach = teach::all();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi">
@include('home.component.head',['home' => $home])

<body>
	@include('home.component.mobile')
	<div id="row-0 home">
		<div class="banner-slider-index">
		    <!--
		    #################################
		        - SLIDER PRO BANNER -
		    #################################
		    -->
		    @include('home.component.slide', ['banner' => $banner, 'image' => $image])
		    <script>
		        $(document).ready(function() {
		            $('#my-slider').sliderPro({
		                width: 1920,
		                height: 720,
		                arrows: true,
		                forceSize: 'fullWidth',
		                fade: true,
		                buttons: false,
		                fullScreen: true,
		                shuffle: true,
		                smallSize: 500,
		                mediumSize: 1000,
		                largeSize: 2500,
		                thumbnailArrows: true,
		                autoplay: true,
		                autoplayDelay: 5000
		            });

		        })
		    </script>
		    @include('home.component.header', ['home' => $home, 'category' => $category, 'category_child' => $category_child])
		</div>
		<div id="main">
			@yield('content')
			@include('home.component.recomend',['home' => $home])
			@include('home.component.teach',['teach' => $teach])
			@include('home.component.student',['home' => $home])
			@include('home.component.partner',['home' => $home])
		</div>
		@include('home.component.footer', ['home' => $home])

		</div>
	@include('home.component.script')
</body>
</html>
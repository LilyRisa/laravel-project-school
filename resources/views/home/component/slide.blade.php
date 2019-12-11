<div class="slider-pro" id="my-slider">
    <div class="sp-slides">
        <!-- Slide 1 -->
        @foreach($banner as $bn)
        <div class="sp-slide">
            @foreach($image as $im)
                @if($im->id == $bn->img_id)
            <img class="sp-image" src="{{asset('/')}}{{$im->url}}" alt="Banner" />
            @endif
            @endforeach
            <div class="container" style="">
                <div class="sp-layer sp-sub-title-slide" data-position="left" data-vertical="0" data-show-transition="up" data-hide-transition="down" data-show-delay="500" style="color: #fff">
                    <!--                                <h2 class="sp-title-slide">-->
                    <!--                                    -->
                    <!--                        -->
                    <!--                                </h2>-->
                    <div></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@extends('home.layout')

@section('content')
<style type="text/css">.dmca {margin-top: 20px;}</style>
<div id="detail-lecturer">
	<div class="container">
		<div class="lecturer_detail">
			<div class="left-in">
				<div class="info_lecturer">
					<div class="avatar">
                        <img src="{{asset('/images')}}/{{$teach['teach_avatar']}}">
                    </div>
				</div>
			</div>
			<div class="right-in">
				<div class="description">
					<div class="title-descritption">
						
                        <span>Giảng Viên: </span> <span class="name-td">{{$teach['teach_name']}}</span>
                        {!! $teach['teach_descriptions'] !!}
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
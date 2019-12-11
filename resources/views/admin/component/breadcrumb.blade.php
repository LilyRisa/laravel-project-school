<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    	@for($i=1; $i <= $count; $i++)
      		<li class="breadcrumb-item active"><a href="{{URL::to('/')}}/admin/{{ ${'title'.$i} }}" title="{{${'title'.$i} }}">{{ ${'title'.$i} }}</a></li>
      @endfor 
    </ol>
</div>
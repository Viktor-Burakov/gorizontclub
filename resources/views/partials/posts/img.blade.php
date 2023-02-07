<div class="img">


@foreach ($content->value as $image)
   @if ($loop->count == 1)
   <img src="{{ asset('/storage/images/' . $image) }}">
   @else
   
      
   


   @if ($loop->first)
      <div class="row">
   @endif
<div class="col"><img src="{{ asset('/storage/images/' . $image) }}"></div>
   @if ($loop->last)
      </div>
   @endif


   @endif
      


@endforeach
</div>
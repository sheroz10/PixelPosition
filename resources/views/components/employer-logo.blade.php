@props(['employer', 'width' => 90])

{{-- <img src="{{ asset($employer->logo) }}" alt="http://picsum.photos/seed/{{rand(0,1000)}}/{{ $width }}/{{ $width }}" class="rounded-xl" width="{{$width}}"> --}}

<img src="http://picsum.photos/seed/{{rand(0,1000)}}/{{ $width }}/{{ $width }}" alt="" >
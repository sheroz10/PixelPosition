@props(['job'])

<div class="p-4 bg-white/5 rounded-lg flex flex-col text-center border border-transparent hover:border-blue-600 group">
    <div class="self-start">
        {{ $job->employer->name }}
    </div>
    <div>
        <h3 class = "group-hover:text-blue-600 mt-4">
           
            <a href="{{$job->url}}">
                {{$job->title}}
            </a>
        </h3>
        <p>{{$job->salary}}</p>
    </div>
    <div class="flex justify-between items-center mt-auto">
        <div class="space-x-1 mt-7">

            
            @foreach ($job->tags as $tag)
            <x-tag :$tag />       
            @endforeach

        </div>

        <x-employer-logo :employer="$job->employer"  :width="42" />

    </div>
</div>
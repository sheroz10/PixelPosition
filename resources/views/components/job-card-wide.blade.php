@props(['job'])

<div class="p-4 mt-4 bg-white/5 rounded-lg flex flex-row gap-x-6 border border-transparent hover:border-blue-600 group">

    <div>
        <x-employer-logo :employer="$job->employer" />
    </div>

    <div class="flex-1 flex flex-col">
        <a href="#" class="text-sm text-gray-400">
            {{$job->employer->name}}
        </a>
            <h3 class="font-bold text-xl mt-3 group-hover:text-blue-600">
                           
            <a href="{{$job->url}}" target="_blank">
                {{$job->title}}
            </a>

            </h3>
            <p class="text-sm text-gray-400 mt-auto">{{$job->salary}}</p>
    </div>

    <div>

        @foreach ($job->tags as $tag)
        <x-tag :$tag />       
        @endforeach

    </div>





</div>

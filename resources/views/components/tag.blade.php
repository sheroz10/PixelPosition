@props(['tag'])
<a href="/tag/{{ strtolower($tag->name) }}" 
    class="bg-white/10 hover:bg-white/25 px-2 py-2 text-xs rounded-xl transition-colors duration-300 mx-1">
    {{$tag->name}}

</a>

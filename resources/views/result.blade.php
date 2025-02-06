<x-layout>
    <x-page-heading>Result</x-page-heading>

    @if (count($jobs) == 0)

    <x-blank/>
    
    @endif

    @foreach ($jobs as $job)
    <x-job-card-wide :$job/>
        
    @endforeach

   
</x-layout>
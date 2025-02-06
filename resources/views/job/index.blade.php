<x-layout>

    <section class="text-center">
        <h1 class="font-bold text-4xl">Let's Find Your Next Job</h1>
        <x-forms.form action="/search">
            <x-forms.input :label=false name="q" placeholder="Web Developer..."/> 
        </x-forms.form>

    </section>

    <div class="space-y-10 mt-6">
        <section>
            <x-section-heading>Feature Jobs</x-section-heading>
            <div class="grid lg:grid-cols-3 gap-8 mt-6">

                @foreach ($featured_jobs as $job)
                    <x-job-card :$job />
                @endforeach
                
            </div>
        </section>

        <section>
            <x-section-heading>Tags</x-section-heading>
            <div class="mt-6 space-x-1">
                @foreach ($tags as $tag)
                <x-tag :$tag />                   
                @endforeach
            </div>
        </section>

        <section>
            <x-section-heading>Recent Jobs</x-section-heading>
            <div class="m-6 space-y-6">

                @foreach ($jobs as $job)
                    <x-job-card-wide :$job />
                @endforeach

            </div>

        </section>

    </div>
</x-layout>

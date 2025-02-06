<x-layout>
    <p class="mb-3 mt-3 text-center">
        here the Salaries and Title of the page
    </p>


    <table class="md:table-fixed w-full">
        <thead>
            <tr>
                <th>Title</th>
                <th>Salary</th>
            </tr>
        </thead>

        @foreach ($jobs as $job)
            <tbody class="font-bold text-center">
                <tr>
                    <td> {{ $job->title }} </td>
                    <td> {{ $job->salary }} </td>
                </tr>

            </tbody>
        @endforeach
    </table>

</x-layout>

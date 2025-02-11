<x-layout>
    <x-slot:heading>Job Listing </x-slot:heading>
    <h1 class="font-bold text-lg">{{$job->title}} </h1>
    <h4> {{$job->salary}} is given salary to {{$job->title}} per year.</h4>

    @can('edit',$job) <!-- here this can is implemented beacuse edit job gate is defined in appserviceprovider to check authorization-->
    <p class="mt-4">
        <x-button href="/jobs/{{$job->id}}/edit">Edit Job</x-button>
    </p>
    @endcan
</x-layout>    
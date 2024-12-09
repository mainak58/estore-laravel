<x-layout>
    <x-slot:header>
        This is the Job Details page
    </x-slot:header>

    <div class="space-y-4">
        <h2 class="text-2xl font-bold">{{ $job['title'] }}</h2>
        <p class="text-xl">{{ $job['description'] }}</p>
        <a href="/jobs">Go back</a>
        <a href="/jobs/{{ $job->id }}/edit">Edit</a>
    </div>

    <form method="POST" action="/jobs/{{ $job->id }}" id="delete-form">
        @csrf
        @method('DELETE')
        <button type="submit">delete</button>
    </form>
</x-layout>

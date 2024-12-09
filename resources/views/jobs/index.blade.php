<x-layout>
    <x-slot:header>
        This is the Jobs page
    </x-slot:header>

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <div>
                <a href="/jobs/{{ $job['id'] }}" class="block">
                    <h1 class="text-2xl font-bold">{{ $job['title'] }}</h1>
                    <h3 class="text-xl">{{ $job['description'] }}</h3>
                </a>
            </div>
        @endforeach

        <div>
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>

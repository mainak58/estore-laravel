@props(['active' => false, 'type' => 'a'])



{{-- <{{ $type }} 
    class="{{ request()->is('/') || request()->is('') ? 'text-blue-500 bg-blue-600' : 'text-white' }} 
        block py-2 px-3 rounded md:bg-transparent md:p-0 dark:text-white"
    aria-current="page"
    {{ $attributes }}
>
    {{ $slot }}
</{{ $type }}> --}}

@if ($type === 'a')
    {
    <a class="{{ request()->is('/') || request()->is('') ? 'text-blue-500 bg-blue-600' : 'text-white' }} 
        block py-2 px-3 rounded md:bg-transparent md:p-0 dark:text-white"
        aria-current="page" {{ $attributes }}>

        {{ $slot }}

    </a>
    }
@else
    <button
        class="{{ request()->is('/') || request()->is('') ? 'text-blue-500 bg-blue-600' : 'text-white' }} 
        block py-2 px-3 rounded md:bg-transparent md:p-0 dark:text-white"
        aria-current="page" {{ $attributes }}>

        {{ $slot }}

    </button>
@endif

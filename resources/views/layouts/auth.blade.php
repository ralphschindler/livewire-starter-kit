<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <x-layouts::components.head :title="$title ?? null" />
</head>
@switch($variation ?? 'simple')
    @case('split')
        <body class="min-h-screen bg-white antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900">
            <div class="relative grid h-dvh flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
                <div class="bg-muted relative hidden h-full flex-col p-10 text-white lg:flex dark:border-e dark:border-neutral-800">
                    <div class="absolute inset-0 bg-neutral-900"></div>
                    <a href="{{ route('home') }}" class="relative z-20 flex items-center text-lg font-medium" wire:navigate>
                        <span class="flex h-10 w-10 items-center justify-center rounded-md">
                            <x-layouts::components.app-logo-icon class="me-2 h-7 fill-current text-white" />
                        </span>
                        {{ config('app.name', 'Laravel') }}
                    </a>

                    @php
                        [$message, $author] = str(Illuminate\Foundation\Inspiring::quotes()->random())->explode('-');
                    @endphp

                    <div class="relative z-20 mt-auto">
                        <blockquote class="space-y-2">
                            <flux:heading size="lg">&ldquo;{{ trim($message) }}&rdquo;</flux:heading>
                            <footer><flux:heading>{{ trim($author) }}</flux:heading></footer>
                        </blockquote>
                    </div>
                </div>
                <div class="w-full lg:p-8">
                    <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
                        <a href="{{ route('home') }}" class="z-20 flex flex-col items-center gap-2 font-medium lg:hidden" wire:navigate>
                            <span class="flex h-9 w-9 items-center justify-center rounded-md">
                                <x-layouts::components.app-logo-icon class="size-9 fill-current text-black dark:text-white" />
                            </span>

                            <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                        </a>
                        {{ $slot }}
                    </div>
                </div>
            </div>
            @fluxScripts
        </body>
        @break

    @case('card')

        <body class="min-h-screen bg-neutral-100 antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900">
            <div class="bg-muted flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
                <div class="flex w-full max-w-md flex-col gap-6">
                    <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-medium" wire:navigate>
                        <span class="flex h-9 w-9 items-center justify-center rounded-md">
                            <x-layouts::components.app-logo-icon class="size-9 fill-current text-black dark:text-white" />
                        </span>

                        <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                    </a>

                    <div class="flex flex-col gap-6">
                        <div class="rounded-xl border bg-white dark:bg-stone-950 dark:border-stone-800 text-stone-800 shadow-xs">
                            <div class="px-10 py-8">{{ $slot }}</div>
                        </div>
                    </div>
                </div>
            </div>
            @fluxScripts
        </body>
        @break

    @default

        <body class="min-h-screen bg-white antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900">
            <div class="bg-background flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
                <div class="flex w-full max-w-sm flex-col gap-2">
                    <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-medium" wire:navigate>
                        <span class="flex h-9 w-9 mb-1 items-center justify-center rounded-md">
                            <x-layouts::components.app-logo-icon class="size-9 fill-current text-black dark:text-white" />
                        </span>
                        <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                    </a>
                    <div class="flex flex-col gap-6">
                        {{ $slot }}
                    </div>
                </div>
            </div>
            @fluxScripts
        </body>
        @break
@endswitch
</html>

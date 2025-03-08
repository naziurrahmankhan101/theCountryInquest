@props(['author', 'size'])

@php
    
    $imageSize = match ($size ?? null) {
        'xs' => 'w-7 h-7',
        'sm' => 'w-9 h-9',
        'md' => 'w-10 h-10',
        'lg' => 'w-14 h-14',
        default => 'w-10 h-10',
    };
    
    $textSize = match ($size ?? null) {
        'xs' => 'text-xs',
        'sm' => 'text-sm',
        'md' => 'text-base',
        'lg' => 'text-xl',
        default => 'text-base',
    };
    
@endphp


@if (auth()->check())
    <img src="{{ auth()->user()->profile_photo_url }}" alt="Profile Photo">
@else
    <p>No user logged in</p>
@endif

@if (auth()->check())
    <p>User is logged in: {{ auth()->user()->name }}</p>
@else
    <p>No user is logged in</p>
@endif

@props(['category', 'level' => 0, 'oldValue' => null])

@php
    $indentation = str_repeat('-', $level);
@endphp

<option value="{{$category->id}}" {{ $oldValue == $category->id ? 'selected' : '' }}>{{  $indentation . ' ' . $category->name }}</option>

@if ($category->children)
    @foreach ($category->children as $child)
        <x-categories-select :category="$child" :level="$level + 1" />
    @endforeach
@endif

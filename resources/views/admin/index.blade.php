@extends('layouts.app')

@section('content')

    <div class="content-in">
    @fragment('frag')
        @foreach($items as $content)
            @include('admin.index-item')
        @endforeach
    @endfragment
    </div>

@endsection


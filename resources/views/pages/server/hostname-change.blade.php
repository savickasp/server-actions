@extends('layouts.app')

@section('content')
    @if(session('message'))
        <div class="bg-blue-300 w-full py-4 text-center rounded">
            {{ session('message') }}
        </div>
    @endif
    <div class="h-full w-full py-36">
        <form action="{{ route('server.hostname-change.confirm') }}" method="post"
              class="flex flex-col justify-center items-center">
            @csrf
            <label class="mb-3">Please enter new hostname</label>
            <input class="shadow appearance-none border rounded w-64 py-2 px-3 mb-6 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   type="text"
                   name="hostname"
                   placeholder="New hostname">
            @include('components.button')
        </form>
    </div>
@endsection

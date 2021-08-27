@extends('layouts.app')

@section('content')
    @if(session('message'))
        <div class="bg-blue-300 w-full py-4 text-center rounded">
            {{ session('message') }}
        </div>
    @endif
    <div class="h-full w-full py-36">
        <form action="{{ route('server.reinstall.confirm') }}" method="post"
              class="flex flex-col justify-center items-center">
            @csrf
            <label class="mb-3">Please select OS you want to install</label>
            <div class="w-full flex flex-row justify-between py-3">
                <label class="mt-2">OS:</label>
                <select
                    class="block w-2/3 bg-white border border-gray-900 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    name="os">
                    @foreach($oss as $os)
                        <option value="{{ $os->os }}">{{ $os->title  }}</option>
                    @endforeach
                </select>
            </div>
            @error('os')
            <div class="w-full flex items-center bg-red-200 text-red-500">
                <span>{{ $message }}</span>
            </div>
            @enderror
            @include('components.button')
        </form>
    </div>
@endsection

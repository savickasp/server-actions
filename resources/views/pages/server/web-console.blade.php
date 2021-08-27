@extends('layouts.app')

@section('content')
    @if(session('message'))
        <div class="bg-blue-300 w-full py-4 text-center rounded">
            {{ session('message') }}
        </div>
    @endif
    <div class="h-full w-full py-36">
        <form action="{{ route('server.web-console.confirm') }}" method="post"
              class="flex flex-col justify-center items-center">
            @csrf
            <label class="mb-3">If you want to start web console please submit form</label>
            <div class="w-full flex flex-row justify-between py-3">
                <label class="mt-2">Please select timeout in hours</label>
                <select
                    class="block w-2/3 bg-white border border-gray-900 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    name="timeout">
                    @foreach($timeouts as $timeout)
                        <option value="{{ $timeout }}">{{ $timeout }}</option>
                    @endforeach
                </select>
            </div>
            @error('timeout')
                <div class="w-full flex items-center">
                    <span>{{ $message }}</span>
                </div>
            @enderror
            <div class="w-full flex flex-row justify-between py-3">
                <label class="mt-2">Use white label</label>
                <select
                    class="block w-2/3 bg-white border border-gray-900 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    name="whitelabel">
                    @foreach($whiteLabels as $whiteLabel)
                        <option value="{{ $whiteLabel }}">{{ $whiteLabel ? 'True' : 'False'  }}</option>
                    @endforeach
                </select>
            </div>
            @error('whitelabel')
            <div class="w-full flex items-center bg-red-200 text-red-500">
                <span>{{ $message }}</span>
            </div>
            @enderror
            @include('components.button')
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    @if(session('message'))
        <div class="bg-blue-300 w-full py-4 text-center rounded">
            {{ session('message') }}
        </div>
    @endif
    <div class="h-full w-full py-36">
        <form action="{{ route('server.password-change.confirm') }}" method="post"
              class="flex flex-col justify-center items-center">
            @csrf
            <label class="mb-1">Are you sure you want to reset your password?</label>
            <label class="mb-6">You will receive email with new password</label>
            @include('components.button')
        </form>
    </div>
@endsection

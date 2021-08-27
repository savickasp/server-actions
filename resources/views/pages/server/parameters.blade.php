@extends('layouts.app')

@section('content')
    <div class="h-full w-full py-10">
        <table class="w-8/12 mx-auto text-left border-green-700 border-4">
            @foreach($parameters as $index => $parameter)
            <tr @if($index % 2) class="bg-gray-200" @endif>
                <th class="p-1.5">{{ $parameter['name'] }}</th>
                <td class="p-1.5">{{ $parameter['value'] }}</td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection

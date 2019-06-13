
@extends('welcome')

@section('body')
    <div class="content">
        <div class="title m-b-md">
            Kites Example
        </div>
        @foreach ($arr_info as $item)
            <div class="card mb-5" style="border: solid black 1px;">
                <p>{{ $item['type'] }} Kite</p>
                <p>Description: {{ $item['description'] }}</p>
                <p>Price: ${{ $item['price'] }}</p>
                
                <p>Available with the following options: </p>
                <div>
                    <ul class="pr-5" style="display: inline-block;">
                        @foreach ($item['options'] as $option)
                            <li>{{$option}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
@endsection
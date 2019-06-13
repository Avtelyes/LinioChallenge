
@extends('welcome')

@section('body')
    <div class="content">
        <div class="title m-b-md">
            Numbers Evaluation
        </div>
        <table>
            @foreach ($response as $item)
                @switch($item)
                    @case('Linio')
                        <tr><td style="background-color:yellow">{{ $item }}</td></tr>
                        @break
                    @case('IT')
                        <tr><td style="background-color:blue">{{ $item }}</td></tr>
                        @break
                    @case('Linianos')
                        <tr><td style="background-color:red">{{ $item }}</td></tr>
                        @break
                    @default
                        <tr><td style="background-color:white">{{ $item }}</td></tr>
                @endswitch
            @endforeach
        </table>
    </div>
@endsection
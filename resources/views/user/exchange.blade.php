@extends('layouts.user')

@section('content')
<exchange-component :exchange_info={{ json_encode($data) }}></exchange-component>
@endsection

@extends('layouts.user')

@section('content')
<reset-password-component :token="'{{ $token }}'"></reset-password-component>
@endsection

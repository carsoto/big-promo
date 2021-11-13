@extends('layouts.user')

@section('content')
<record-component :uploadUrl="'/api/upload-dream'"></record-component>
@endsection

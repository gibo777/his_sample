@extends('layouts.app')
@section('content')
<div id="main">
    <div id="contentContainer">
        @livewire('registration-information',['id' => $patientId])
    </div>
</div>
@endsection
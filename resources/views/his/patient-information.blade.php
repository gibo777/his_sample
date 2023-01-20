@extends('layouts.app')
@section('content')

<div id="main">
    <div id="contentContainer">
        @livewire('patient-register.patient-information',['id' => $patientId])
    </div>
</div>
@endsection
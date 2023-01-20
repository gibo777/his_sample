@extends('layouts.app')
@section('content')
<div id="main">
    <div id="contentContainer">
        @livewire('inpatient.inpatient-information',['id' => $inpatientId])
    </div>
</div>
@endsection
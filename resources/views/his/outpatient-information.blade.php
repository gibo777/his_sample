@extends('layouts.app')
@section('content')
<div id="main">
    <div id="contentContainer">
        @livewire('outpatient.outpatient-information',['id' => $outpatientId])
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Réserver une propriété')

@section('content')
<div class="container mx-auto py-12">
  @livewire('booking-manager', ['propertyId' => $property->id])


</div>
@endsection

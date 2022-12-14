@extends('layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-end pt-3 pb-2 mb-3 border-bottom">
    <h2>Your Wallet Accounts <small class="fw-lighter fs-6">(double click to edit)</small></h2>
    {{-- show today date --}}
    <h6 class="text-muted">{{ date('l, j F Y') }}</h6>
  </div>

  {{-- All Wallets Card --}}
  @include('wallets.layouts.card')

  {{-- Create Wallet Form --}}
  @include('wallets.layouts.create')

  {{-- All Wallets Table --}}

@endsection

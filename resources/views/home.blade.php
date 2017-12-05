@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!--Add buttons to initiate auth sequence and sign out-->
        <button id="authorize-button" style="display: none;">Authorize</button>
        <button id="signout-button" style="display: none;">Sign Out</button>
        <pre id="content"></pre>
      </div>
    </div>
  </div>
@endsection

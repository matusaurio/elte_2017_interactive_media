@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <!--Google-->
        <button id="authorize-button">Authorize</button>
        <button id="signout-button" style="display: none;">Sign Out</button>
        <!--Facebook-->
        <div class="fb-login-button" id='loginBtn' data-max-rows="1" data-size="medium" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <!--Calendar-->
        <div id='fullcal'></div>
      </div>
      <div class="col-md-3">
        <!--Log-->
        <pre id="content"></pre>
      </div>
    </div>
  </div>
@endsection

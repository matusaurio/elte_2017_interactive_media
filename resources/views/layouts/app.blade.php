<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="favicon.ico">

  <title>PLANiT</title>

  <!-- Fonts -->
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous"> --}}
  <link rel="stylesheet" href="{{asset('lib/font-awesome.min.css')}}">
  {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700"> --}}

  <!-- Styles -->
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> --}}
  <link rel="stylesheet" href="{{asset('lib/bootstrap.min.css')}}">
  {{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/> --}}
  <link rel="stylesheet" href="{{asset('lib/fullcalendar.min.css')}}">
</head>
<body id="app-layout">
  <nav class="navbar navbar-default navbar-static-top navbar-inverse">
    <div class="container">
      <div class="navbar-header">

        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
          PLANiT
        </a>
      </div>

      <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
          <li><a href="{{ url('/home') }}">Home</a></li>
          @if (!Auth::guest())
            <li><a id="btn-create" data-toggle="modal" href="#modalCreate">Create an Event</a></li>
          @endif
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
          @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
              </ul>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')

  <!-- Modal -->
  <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Create an event</h4>
        </div>
        <div class="modal-body">
          <form name="eventForm" id="form_id">
            <div class="form-group">
              <label for="summary">Summary :</label>
              <input class="form-control" type="text" name="summary" id="summary" placeholder="Summary" />
            </div>
            <div class="form-group">
              <label for="location">Location :</label>
              <input class="form-control" type="text" name="location" id="location" placeholder="Location" />
            </div>
            <div class="form-group">
              <label for="description">Description :</label>
              <input class="form-control" type="text" name="description" id="description" placeholder="Description" />
            </div>
            <div class="form-group">
              <label for="number">Reminder : </label>
              <input class="form-control" type="number" name="reminder" id="reminder" placeholder="Minutes" min="10" value="10" />
            </div>
            <div class="form-group">
              <label for="type">Type :</label>
              <select name="type" id="type" placeholder="Types">
                <option selected disabled >Select</option>
                <option value="2" style="color:#7AE7BF">Other</option>
                <option value="3" style="color:#DBADFF">Party/Event</option>
                <option value="4" style="color:#FF887C">Cook/Eat</option>
                <option value="5" style="color:#FBD75B">Assignment</option>
                <option value="6" style="color:#FFB878">Class</option>
                <option value="7" style="color:#46D6DB">Work</option>
                <option value="10" style="color:#51B749">Sleep</option>
                <option value="11" style="color:#DC2127">Fixed</option>
              </select>
            </div>
            <div style="color:darkgreen;display:none;" id="viewForStaticEvent">
              <div class="form-group">
                <label for="start">Start Time :</label>
                <input class="form-control" type="datetime-local" name="start" id="start" placeholder="Start" value="2017-12-04T08:00:00" />
              </div>
              <div class="form-group">
                <label for="end">End Time :</label>
                <input class="form-control" type="datetime-local" name="end" id="end" placeholder="End" value="2017-12-04T09:00:00" />
              </div>
            </div>

            <div style="color:brown;display:none;" id="viewForDinamicEvent">
              <div class="form-group">
                <label for="hours">Nr. of hours : </label>
                <input class="form-control" type="number" name="hours" id="hours" placeholder="Hours" min="1" max="8" value="1" />
              </div>
              <div class="form-group">
                <label for="deadline">Deadline :</label>
                <input class="form-control" type="datetime-local" name="deadline" id="deadline" placeholder="Deadline" value="2017-12-04T09:00:00" />
              </div>
          </div>
          <div class="input-group">
            <input class="btn btn-primary" type="button" name="submit_id" id="btn_id" value="Create" onclick="submitForm()" />
            <input class="btn btn-default" type="button" value="Delete all" onclick="deleteAll()" />
            <input class="btn btn-default" type="button" value="Seed" onclick="seed()" />
          </div>
      </form>
    </div>
    {{-- <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Save changes</button>
  </div> --}}
</div>
</div>
</div>

<!-- JavaScripts -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script> --}}
<script src="{{asset('lib/jquery.min.js')}}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> --}}
<script src="{{asset('lib/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script> --}}
<script src="{{asset('lib/moment.min.js')}}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script> --}}
<script src="{{asset('lib/fullcalendar.min.js')}}"></script>
</body>
</html>

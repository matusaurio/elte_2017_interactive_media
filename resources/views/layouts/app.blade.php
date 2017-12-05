<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="favicon.ico">

  <title>PLANiT</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

  <!-- Styles -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <style>
  body {
    font-family: 'Lato';
  }

  .fa-btn {
    margin-right: 6px;
  }
  </style>
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
          <li><a id="btn-create" data-toggle="modal" href="#modalCreate">Create an Event</a></li>
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
            <label>Summary :</label>
            <input type="text" name="summary" id="summary" placeholder="Summary" /> </br>
            <label>Location :</label>
            <input type="text" name="location" id="location" placeholder="Location" /> </br>
            <label>Description :</label>
            <input type="text" name="description" id="description" placeholder="Description" />
            <br/>
            <label>Type :
              <label>
                <select name="type" id="type" placeholder="Types">
                  <option value="2" selected style="color:#7AE7BF">Other</option>
                  <option value="3" style="color:#DBADFF">Party/Event</option>
                  <option value="4" style="color:#FF887C">Cook/Eat</option>
                  <option value="5" style="color:#FBD75B">Assignment</option>
                  <option value="6" style="color:#FFB878">Class</option>
                  <option value="7" style="color:#46D6DB">Work</option>
                  <option value="10" style="color:#51B749">Sleep</option>
                  <option value="11" style="color:#DC2127">Fixed</option>
                </select>
                </br>
                <label>Reminder : </label>
                <input type="number" name="reminder" id="reminder" placeholder="Minutes" min="10" value="10" /> </br>
                <div style="color:darkgreen" id="viewForStaticEvent">
                  <label>Start Time :</label>
                  <input type="datetime-local" name="start" id="start" placeholder="Start" value="2017-12-04T08:00:00" />
                  </br>
                  <label>End Time :</label>
                  <input type="datetime-local" name="end" id="end" placeholder="End" value="2017-12-04T09:00:00" />
                  </br>
                </div>

                <div style="color:brown" id="viewForDinamicEvent">
                  <label>Nr. of hours : </label>
                  <input type="number" name="hours" id="hours" placeholder="Hours" min="1" max="8" value="1" /> </br>
                  <label>Deadline :</label>
                  <input type="datetime-local" name="deadline" id="deadline" placeholder="Deadline" value="2017-12-04T09:00:00" />
                  </br>
                </div>
                <input type="button" name="submit_id" id="btn_id" value="Create" onclick="submitForm()" />
                <input type="button" value="Delete all" onclick="deleteAll()" />
                <input type="button" value="Seed" onclick="seed()" />
                </br>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()">
</body>
</html>

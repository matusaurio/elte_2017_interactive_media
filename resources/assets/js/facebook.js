var events = [];
$(document).ready(function() {
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '876969792383940',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.11'
    });

    FB.getLoginStatus(function(response) {
      if (response.status === 'connected') {
        document.getElementById('loginBtn').style.display='none';
        FB.api('me?fields=events', function(response) {
          for ( x in response.events.data) {

            events.push({

              title: response.events.data[x]['name'],
              start: response.events.data[x]['start_time']
            });

          }

          $('#fullcal').fullCalendar({
            events: events,
            eventClick: function(event, element) {

              event.title = "CLICKED!";
              console.log('addsdd');
              $('#fullcal').fullCalendar('updateEvent', event);

            }

          });

        });
      }
    });
  };
  (function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
});

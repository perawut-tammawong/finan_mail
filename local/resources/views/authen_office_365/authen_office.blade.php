<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Quickstart | MSAL.JS Vanilla JavaScript SPA</title>

    <!-- msal.js with a fallback to backup CDN -->
    <script type="text/javascript" src="https://alcdn.msauth.net/lib/1.2.1/js/msal.js" integrity="sha384-9TV1245fz+BaI+VvCjMYL0YDMElLBwNS84v3mY57pXNOt6xcUYch2QLImaTahcOP" crossorigin="anonymous"></script>
    <script type="text/javascript">
      if(typeof Msal === 'undefined')document.write(unescape("%3Cscript src='https://alcdn.msftauth.net/lib/1.2.1/js/msal.js' type='text/javascript' integrity='sha384-m/3NDUcz4krpIIiHgpeO0O8uxSghb+lfBTngquAo2Zuy2fEF+YgFeP08PWFo5FiJ' crossorigin='anonymous'%3E%3C/script%3E"));
    </script>

    <!-- adding Bootstrap 4 for UI components  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="/">MS Identity Platform</a>
      <div class="btn-group ml-auto dropleft">
        <button type="button" id="signIn" class="btn btn-secondary" onclick="signIn()">Sign In</button>
        <button type="button" id="signOut" class="btn btn-success d-none" onclick="signOut()">Sign Out</button>
    </div>
    </nav>
    <br>
    <h5 class="card-header text-center">Vanilla JavaScript SPA calling MS Graph API with MSAL.JS</h5>
    <br>
    <div class="row" style="margin:auto" >
    <div id="card-div" class="col-md-3 d-none">
    <div class="card text-center">
      <div class="card-body">
        <h5 class="card-title" id="welcomeMessage">Please sign-in to see your profile and read your mails</h5>
        <div id="profile-div"></div>
        <br>
        <br>
        <button class="btn btn-primary" id="seeProfile" onclick="seeProfile()">See Profile</button>
        <br>
        <br>
        <button class="btn btn-primary d-none" id="readMail" onclick="readMail()">Read Mails</button>
      </div>
    </div>
    </div>
    <br>
    <br>
      <div class="col-md-4">
        <div class="list-group" id="list-tab" role="tablist">
        </div>
      </div>
      <div class="col-md-5">
        <div class="tab-content" id="nav-tabContent">
        </div>
      </div>
    </div>
    <br>
    <br>

    <!-- importing bootstrap.js and supporting js libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- importing app scripts (load order is important) -->
    <script type="text/javascript" src="{{ url('/authConfig.js') }}"></script>
    <script type="text/javascript" src="{{ url('/graphConfig.js') }}"></script>
    <script type="text/javascript" src="{{ url('/ui.js') }}"></script>

    <!-- replace next line with authRedirect.js if you would like to use the redirect flow -->
    <!-- <script type="text/javascript" src="./authRedirect.js"></script>   -->
    <script type="text/javascript" src="{{ url('/authPopup.js') }}"></script>
    <script type="text/javascript" src="{{ url('/graph.js') }}"></script>
  </body>
</html>

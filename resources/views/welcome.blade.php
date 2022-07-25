<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>LaVuex</title> 
  </head>
  <body>  
      <div id="app">
          <app></app>   
      </div>

      @vite('resources/js/app.js')
  </body>
</html>
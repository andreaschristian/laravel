<html>
  <head>
      <title> Profil</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            {!! Html::style('MDL/material.min.css')!!}
            {!! Html::style('css/bootstrap.min.css')!!}
            {!! Html::script('js/bootstrap.min.css')!!}
            {!! Html::script('js/bootstrap.js')!!}
            {!! Html::script('MDL/material.min.js')!!}
  </head>
  <body>
    <div id="container">
      <div id="jumbotron">
          <h1> Just tes blade template</h1>
        <p>  @yields('content')</p>
          <p><a href="#" class="btn btn-primary">Learn more </a>
          </P>
      </div>
    </div>
  </body>
</html>

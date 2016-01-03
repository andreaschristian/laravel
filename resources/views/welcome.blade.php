
<html>
  <head>
      <title> MainMenu</title>
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            {!! Html::style('MDL/material.css')!!}
            {!! Html::style('css/default.css')!!}
            {!! Html::style('css/bootstrap.css')!!}
            {!! Html::script('js/bootstrap.min.css')!!}
            {!! Html::script('js/bootstrap.js')!!}
            {!! Html::script('MDL/material.min.js')!!}
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <!-- Title -->
        <span class="mdl-layout-title">Berbagi-Bersama</span>
        <!-- Add spacer, to align navigation to the right -->
        <div class="mdl-layout-spacer">

        </div>
        <!-- Navigation. We hide it in small screens. -->
        <nav class="mdl-navigation mdl-layout--large-screen-only">
           @if(count ($mainmenu))
          @foreach($mainmenu as $mainmenu)
          <a class="mdl-navigation__link" href="/mainmenu/{{$mainmenu->link_menu}}">{{$mainmenu->nama_menu}}</a>
          @endforeach
            @endif
        </nav>
      </div>
    </header>





    <main class="mdl-layout__content">
      <div class="page-content"><!-- Your content goes here -->

        <div class="boxcari">
          <ul class="pager ">
            <li><a href="#">Box Office</a></li>
            <li><a href="#">Tv Series</a></li>

            <div class="search-button">
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div>
          </ul>
        </div>
        <!--BOX CARI ------------------------------------------------->

          <div class="page-header">
            <h2> Latest Update</h2>
          </div>
          <hr size="20">
              <div class="gambarthumbnail">
                <h3> Movies</h3>
                  @if(count($boxoffice))
                  @foreach($boxoffice as $boxoffice)
                      <div class="thumbnail" >
                          <img src="{{$boxoffice->gambar}}" alt="{{$boxoffice->gambar}}"  >
                          <div class="caption">
                            <h5><a href="{{$boxoffice->link_download_film}}">{{$boxoffice->nama_film}}</a></h5>
                            <p>{{$boxoffice->kualitas}} </p>
                          </div>
                        </div>
                        @endforeach
                        @endif
            </div>
            <a href="/auth/facebook">Login dengan facebook</a>
                          <div class="gambarthumbnail">
                            <h3>TvSeries</h3>
                              @if(count($tvseries))
                              @foreach($tvseries as $tvseries)
                                  <div class="thumbnail" >
                                      <img src="{{$tvseries->gambar}}" alt="{{$tvseries->gambar}}"  >
                                      <div class="caption">
                                        <h5><a href="{{$boxoffice->link_download_film}}">{{$tvseries->nama_tvseries}}</a></h5>
                                        <p>aaa </p>
                                      </div>
                                    </div>
                                    @endforeach
                                    @endif
                        </div>


          </div>
      </div>

    </main>
  </div>
  </body>
</html>

<link rel="stylesheet" type="text/css" href="<?php echo  $base_url; ?>/lib/menu.css" media="all">
<header role="banner" class="navbar navbar-fixed-top navbar-inverse">
  <div class="container">
    <div class="navbar-header">

      <h2>PostItMap</h2>

        <nav role="navigation" class="navbar-collapse">
          <ul class="nav navbar-nav">
            <li>
              <form class="navbar-form" role="search">
                <div class="form-group  navbar-right">
                  <div class="input-group">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                    </span>
                    <input type="text" class="form-control" placeholder="Seach" aria-hidden="true">
                  </div>
                </div>
              </form>
            </li>
            <li><a href="#Home">Home</a></li>
            <li><a href="#Setting">Setting</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" role="button" aria-expanded="false" href="#" data-toggle="dropdown">BookMark <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">List1</a></li>
                <li><a href="#">List2</a></li>
                <li><a href="#">List3</a></li>
                <li class="divider"></li>
                <li><a href="#">EditBookMark</a></li>
              </ul>
            </li>
            <li><a href="<?php echo $base_url; ?>/account/signout">ログアウト</a></li>
          </ul>
        </nav>
      </div>

</header>
<!--<div class="container side-collapse-container">
  <div class="map-canvas-wrapper">
    <div id="map-canvas"></div>
  </div>
</div>-->
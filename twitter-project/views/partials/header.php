

   
        <nav class="navbar navbar-default">
        <div class="container-fluid">
      
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../controleur/home.php">Twitter</a>
          </div>

            
            <form class="navbar-form navbar-left" method="post" id="search_form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" name="search" id="search">
              </div>
              <input type="hidden" name="action" value="rechercher" />
              <input type="submit" name="search_users" id="search_users" class="btn btn-primary" value="search" />
                                
            </form>


            <ul class="nav navbar-nav navbar-right">
              <li><a href="../controleur/reception.php">Message</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $user->display_name; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="../controleur/profile.php">Profile</a></li>
                  <li><a href="../controleur/edit_profile.php">Edit Profile</a></li>
                  <li><a href="../controleur/logout.php">Logout</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="../controleur/disable.php">Disable count</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
     
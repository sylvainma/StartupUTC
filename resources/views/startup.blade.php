<!DOCTYPE html>
<html>
<head>
	@include("shared.head")
</head>
<body>
  <header>
    @include("shared.nav")
    <section class="header-title">
      <div class="container">
        <h1 class="center bold">Smeal</h1>
      </div>
    </section>
    <nav class="nav-wrapper bordered z-depth-0">
      <div class="container">
        <div class="col s12">
          <a href="{{ route('index') }}" class="breadcrumb">StartupUTC</a>
          <a href="{{ route('search') }}" class="breadcrumb">Explorer</a>
          <a class="breadcrumb">Smeal</a>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div id="presentation" class="section section-grey scrollspy">
      <div class="container">
        <div class="row">
          <div class="col s12">
            <h3>Présentation</h3>
            <p class="caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
              ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
              ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
              in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
              Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
              mollit anim id est laborum.</p>
            <div class="chip">Data Science</div>
            <div class="chip">Machine learning</div>
            <div class="chip">Développement</div>
          </div>
        </div>
      </div>
    </div>
    <div id="infos" class="section section scrollspy">
      <div class="container">
        <div class="row">
          <ul>
            <li class="col s6 m4 info">
              <div class="info-wrapper">
                <div class="info-icon">
                  <i class="fa fa-flask" aria-hidden="true"></i>
                </div>
                <div class="info-content">
                  <h6 class="info-title">Domaine</h6>
                  <span class="info-desc">Data Science</span>
                </div>
              </div>
            </li>
            <li class="col s6 m4 info">
              <div class="info-wrapper">
                <div class="info-icon">
                  <i class="material-icons">web</i>
                </div>
                <div class="info-content">
                  <h6 class="info-title">Réseaux sociaux</h6>
                  <div class="info-desc">
                    <a class="btn-floating waves-effect waves-light"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a class="btn-floating waves-effect waves-light"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a class="btn-floating waves-effect waves-light"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                  </div>
                </div>
              </div>
            </li>
            <li class="col s6 m4 info">
              <div class="info-wrapper">
                <div class="info-icon">
                  <i class="fa fa-external-link" aria-hidden="true"></i>
                </div>
                <div class="info-content">
                  <h6 class="info-title">Site officiel</h6>
                  <span class="info-desc"><a href="" target="_blank">www.smeal.fr</a></span>
                </div>
              </div>
            </li>
          </ul>

        </div>
      </div>
    </div>
    <div id="network" class="section section-grey scrollspy">
      <div class="container">
        <div class="row">
          <div class="col s12">
            <h4>Réseau</h4>
            <div class="row">
              <div class="col s6 m4">
                <div class="card center">
                  <div class="card-content">
                    <span class="card-title">Sylvain Mirouf</span><br>
                    <h5 class="light">CEO</h5>
                    <a class="btn-floating btn-small waves-effect waves-light"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                  </div>
                </div>
              </div>
              <div class="col s6 m4">
                <div class="card center">
                  <div class="card-content">
                    <span class="card-title">Sylvain Mirouf</span><br>
                    <h5 class="light">CEO</h5>
                    <a class="btn-floating btn-small waves-effect waves-light"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                  </div>
                </div>
              </div>
              <div class="col s6 m4">
                <div class="card center">
                  <div class="card-content">
                    <span class="card-title">Sylvain Mirouf</span><br>
                    <h5 class="light">CEO</h5>
                    <a class="btn-floating btn-small waves-effect waves-light"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="suggest" class="section section scrollspy">
      <div class="container">
        <div class="row">
          <div class="col s12 center">
            <h5 class="light">Des informations sont manquantes, erronées ou confidentielles ?</h5><br>
            <a href="" target="_blank" class="btn btn-large waves-effect waves-light"><i class="material-icons left">mode_edit</i> Corriger</a>
            <a href="" target="_blank" class="btn btn-large waves-effect waves-light"><i class="material-icons left">email</i> Nous contacter</a>
          </div>
        </div>
      </div>
    </div>
    <div class="toc-wrapper">
      <div class="hide-on-med-and-down">
        <ul class="section table-of-contents">
          <li><a href="#presentation">Présentation</a></li>
          <li><a href="#infos">Informations</a></li>
          <li><a href="#network">Réseau</a></li>
          <li><a href="#suggest">Corriger</a></li>
        </ul>
      </div>
    </div>
  </main>
  @include("shared.footer")
	@include("shared.scripts")
</body>
</html>

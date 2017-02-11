<!DOCTYPE html>
<html>
<head>
	@include("shared.head")
</head>
<body>
  <header>
    @include("shared.nav")
    <section class="header-search bordered">
      <h1 class="center bold">Explorer</h1>
      <div class="container">
        <form class="row">
          <div class="col s12 card-search hoverable">
            <div class="input-field search">
              <input id="search" type="text">
              <label for="search">Nom de l'entreprise, mots-clés, ...</label>
            </div>
            <div class="button">
              <a class="btn-floating btn waves-effect waves-light"><i class="material-icons">search</i></a>
            </div>
          </div>
        </form>
      </div>
    </section>
  </header>

  <main>
    <div class="section section-grey">
      <div class="container">
        <div class="row">
          <div class="col s12 m4 l3">

            <div class="card">
              <div class="card-content">
                <span class="card-title">Domaine</span>
                <p>
                  <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                  <label for="filled-in-box">Tous</label>
                </p>
                <p>
                  <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                  <label for="filled-in-box">Génie informatique</label>
                </p>
                <p>
                  <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                  <label for="filled-in-box">Génie biologique</label>
                </p>
                <p>
                  <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                  <label for="filled-in-box">Génie des procédés</label>
                </p>
                <p>
                  <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                  <label for="filled-in-box">Génie des systèmes urbains</label>
                </p>
              </div>
            </div>

            <div class="card">
              <div class="card-content">
                <span class="card-title">Date de création</span>
                <form action="#">
                  <p class="range-field">
                    <input type="range" id="test5" min="0" max="100" />
                  </p>
                </form>
                </div>
            </div>

          </div>
          <div class="col s12 m8 l9">
            <ul class="collapsible" data-collapsible="accordion">
              <li>
                <div class="collapsible-header">
                  <div class="collapsible-header-logo"><i class="material-icons">business</i></div>
                  <div class="collapsible-header-content">
                    <h5>Smeal <span class="light">(GB)</span></h5>
                  </div>
                </div>
                <div class="collapsible-body">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco...</p>
                  <p class="center"><a class="btn btn-small waves-effect waves-light">En savoir plus</a></p>
                </div>
              </li>
              <li>
                <div class="collapsible-header">
                  <div class="collapsible-header-logo"><i class="material-icons">business</i></div>
                  <div class="collapsible-header-content">
                    <h5>Equisense <span class="light">(GI)</span></h5>
                  </div>
                </div>
                <div class="collapsible-body">
                  <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
                </div>
              </li><li>
                <div class="collapsible-header">
                  <div class="collapsible-header-logo"><i class="material-icons">business</i></div>
                  <div class="collapsible-header-content">
                    <h5>Sensorwake <span class="light">(GI)</span></h5>
                  </div>
                </div>
                <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </main>
  @include("shared.footer")
	@include("shared.scripts")
</body>
</html>

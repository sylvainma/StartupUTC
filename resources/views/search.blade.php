<!DOCTYPE html>
<html ng-app="startuputc-search">
<head>
	@include("shared.head")
</head>
<body ng-controller="SearchCtrl">
  <header>
    @include("shared.nav")
    <section class="header-search bordered">
      <h1 class="center bold">Explorer</h1>
      <div class="container">
        <form class="row">
          <div class="col s12 card-search hoverable">
            <div class="input-field search">
              <input id="search" type="text" ng-model="q" class="autocomplete">
              <label for="search">Nom de l'entreprise, mots-clés, ...</label>
            </div>
            <div class="button">
              <a ng-click="search()" class="btn-floating btn waves-effect waves-light"><i class="material-icons">search</i></a>
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

						<search-results data="results"></search-results>
						
          </div>
        </div>
      </div>
    </div>
  </main>
  @include("shared.footer")
	@include("shared.scripts")
	<script type="text/javascript" src="{{ asset('app/vendor/vendor.js') }}"></script>
	<script type="text/javascript" src="{{ asset('app/env.js') }}"></script>
	<script type="text/javascript" src="{{ asset('app/app.js') }}"></script>
</body>
</html>

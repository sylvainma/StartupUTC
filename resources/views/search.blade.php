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
              <input ng-keypress="($event.charCode==13)? search() : return" id="search" type="text" ng-model="q" class="autocomplete">
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

						<search-options depts="deptsChecked" fields="fieldsChecked" foundation="foundation" callback="update()"></search-options>

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

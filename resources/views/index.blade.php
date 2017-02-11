<!DOCTYPE html>
<html>
<head>
	@include("shared.head")
</head>
<body>
  <header class="header-landing header-filter">
    @include("shared.nav")
    <section class="header-middle white-text">
      <div class="container">
        <h1 class="bold">Explorer le réseau des startups de l'UTC</h1>
        <p class="flow-text">StartupUTC est un moteur de recherche des startups créées par le
          réseau des anciens étudiants de l'Université de Technologie de Compiègne.</p>
        <form class="row">
          <div class="col s12 card-search hoverable">
            <div class="input-field search">
              <input type="text" id="search" class="autocomplete">
              <label for="search">Nom de l'entreprise, mots-clés, ...</label>
            </div>
            <div class="button">
              <a class="btn-floating btn waves-effect waves-light primary"><i class="material-icons">search</i></a>
            </div>
          </div>
        </form>
      </div>
    </section>
    <div class="godown">
      <a class="btn-floating waves-effect waves-light hoverable"><i class="fa fa-angle-down fa-fw"></i></a>
    </div>
  </header>

  <main>
    <div class="section section-grey number">
      <div class="container">
        <div class="row">
          <div class="col s12">
            <h1 class="bold">256</h1>
            <p class="flow-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col m6 center promo">
            <i class="material-icons">account_circle</i>
          </div>
          <div class="col m6 justify">
            <h3>Étudiants</h3>
            Tu es intéressé par la <b>Data Science</b> ou un domaine qui y rattaché (Réseaux, Graphes, Big Data, Machine Learning, Dataviz, ...) ?
            Tu souhaites développer tes compétences dans ce domaine ? Contribuer à des projets valorisants, innovants ? <b>Rejoins-nous dès maintenant</b> !
            Peu importe ton bagage technique actuel, nous sommes tous là pour apprendre et progresser.
          </div>
        </div>
        <div class="divider-60"></div>
        <div class="row">
          <div class="col m6 justify">
            <h3>Entreprises</h3>
            Confiez-nous des projets, laissez-nous construire des choses avec vous. Nous sommes un collectif pluridisciplinaire mais surtout
            passionés. Nos <b>compétences</b> et notre <b>énergie</b> peuvent vous aider. Nous serons très heureux d'en discuter avec vous, alors <b>n'hésitez pas à nous contacter</b> !
          </div>
          <div class="col m6 center promo">
            <i class="material-icons">business</i>
          </div>
        </div>
      </div>
    </div>
    <div class="section section-grey">
      <div class="container">
        <div class="row">
          <div class="col s12">
            <h5 class="light center">Recevez des nouvelles d'Open Datalab directement.
              Nous vous tiendrons au courant des prochaines étapes de l'association avec notre <b>newsletter</b>.</h5>
          </div>
        </div>
        <div class="row">
          <div class="col s12 center">
            <a class="waves-effect waves-light btn"><i class="material-icons left">email</i>Contact</a>
          </div>
        </div>
      </div>
    </div>
  </main>
  @include("shared.footer")
	@include("shared.scripts")
</body>
</html>

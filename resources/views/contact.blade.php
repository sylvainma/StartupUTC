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
        <h1 class="center bold">Contact</h1>
      </div>
    </section>
    <nav class="nav-wrapper bordered z-depth-0">
      <div class="container">
        <div class="col s12">
          <a href="./" class="breadcrumb">StartupUTC</a>
          <a class="breadcrumb">Contact</a>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <div class="container section">
      <div class="row">

        <div class="col s12 m4">
          <div class="row">
            <div class="col s2 secondary" style="padding-top: 12px;"><i class="material-icons">note_add</i></div>
            <div class="col s10">
              <h5>Contributer</h5>
              <p>Vous portez un projet que vous souhaitez référencer ?
                Écrivez-nous pour être référencé dans note moteur de recherche.</p>
            </div>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="row">
            <div class="col s2 secondary" style="padding-top: 12px;"><i class="material-icons left">cancel</i></div>
            <div class="col s10">
              <h5>Corriger des données</h5>
              <p>Vous avez remarqué des données périmées ? Écrivez-nous pour mettre à jour ces informations.</p>
            </div>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="row">
            <div class="col s2 secondary" style="padding-top: 12px;"><i class="material-icons">import_contacts</i></div>
            <div class="col s10">
              <h5>Recours</h5>
              <p>Des informations vous concernant figurent sur ce site ?
                Vous ne souhaitez pas qu'elles apparaissent ? Écrivez-nous pour régler ce problème.</p>
            </div>
          </div>
        </div>

      </div>
      <div class="row">
        <form class="col s12">
          <div class="row">
            <div class="input-field col s12 m6">
              <input ng-model="contact.first_name" id="first_name" type="text" class="validate">
              <label for="first_name">Prénom</label>
            </div>
            <div class="input-field col s12 m6">
              <input ng-model="contact.last_name" id="last_name" type="text" class="validate">
              <label for="last_name">Nom</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input ng-model="contact.email" id="email" type="email" class="validate">
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea ng-model="contact.message" id="textarea1" class="materialize-textarea validate"></textarea>
              <label for="textarea1">Message</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12 center">
              <a class="waves-effect waves-light btn">
                <i class="material-icons left">email</i>Envoyer
              </a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </main>
  @include("shared.footer")
	@include("shared.scripts")
</body>
</html>

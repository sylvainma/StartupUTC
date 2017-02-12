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
        <h1 class="center bold">{{ $s->name_official }}</h1>
      </div>
    </section>
    <nav class="nav-wrapper bordered z-depth-0">
      <div class="container">
        <div class="col s12">
          <a href="{{ route('index') }}" class="breadcrumb">StartupUTC</a>
          <a href="{{ route('search') }}" class="breadcrumb">Explorer</a>
          <a class="breadcrumb">{{ $s->name_official }}</a>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div id="presentation" class="section section-grey scrollspy">
      <div class="container">
        <div class="row">
          <div class="col s12">

						@if (session('status'))
							<div class="card-alert success">
								<p><i class="material-icons">check_circle</i>
									Vos modifications ont bien été enregistrées et seront examinées prochainement.
									Vous recevrez un mail vous informant de cette validation.</p>
							</div>
						@endif

            <h3>Présentation</h3>
						<p class="caption">{{ $s->description }}</p>
						@foreach ($s->keywords()->get()->all() as $keyword)
							<div class="chip">{{ $keyword->name }}</div>
						@endforeach
          </div>
        </div>
      </div>
    </div>
		@if($infos)
    <div id="infos" class="section section scrollspy">
      <div class="container">
        <div class="row">
          <ul>
						@if ($s->field)
            <li class="col s6 m4 info">
              <div class="info-wrapper">
                <div class="info-icon">
                  <i class="fa fa-flask" aria-hidden="true"></i>
                </div>
                <div class="info-content">
                  <h6 class="info-title">Domaine</h6>
                  <span class="info-desc">{{ $s->field->name }}</span>
                </div>
              </div>
            </li>
						@endif

						@if ($s->twitter || $s->facebook || $s->linkedin)
            <li class="col s6 m4 info">
              <div class="info-wrapper">
                <div class="info-icon">
                  <i class="material-icons">web</i>
                </div>
                <div class="info-content">
                  <h6 class="info-title">Réseaux sociaux</h6>
                  <div class="info-desc">
                    @if ($s->twitter)
											<a href="{{ $s->twitter }}" class="btn-floating waves-effect waves-light" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
										@endif
										@if ($s->facebook)
											<a href="{{ $s->facebook }}" class="btn-floating waves-effect waves-light" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
										@endif
										@if ($s->linkedin)
											<a href="{{ $s->linkedin }}" class="btn-floating waves-effect waves-light" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
										@endif
                  </div>
                </div>
              </div>
            </li>
						@endif

						@if ($s->url)
            <li class="col s6 m4 info">
              <div class="info-wrapper">
                <div class="info-icon">
                  <i class="fa fa-external-link" aria-hidden="true"></i>
                </div>
                <div class="info-content">
                  <h6 class="info-title">Site officiel</h6>
                  <span class="info-desc"><a href="{{ $s->url }}" target="_blank">{{ $s->url }}</a></span>
                </div>
              </div>
            </li>
						@endif
          </ul>
        </div>
      </div>
    </div>
		@endif
		@if ($network)
    <div id="network" class="section section-grey scrollspy">
      <div class="container">
        <div class="row">
          <div class="col s12">
            <h4>Réseau</h4>
            <div class="row">
							@foreach($s->individuals()->get()->all() as $ind)
              <div class="col s6 m4">
                <div class="card center">
                  <div class="card-content">
                    <span class="card-title">{{ $ind->full_name }}</span><br>
                    <h6>{{ $ind->pivot->job_title }}</h5>
										@if ($ind->linkedin)
                    	<a href="{{ $ind->linkedin }}" target="_blank" class="btn-floating btn-small waves-effect waves-light"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
										@endif
                  </div>
                </div>
              </div>
							@endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
		@endif
    <div id="suggest" class="section section scrollspy">
      <div class="container">
        <div class="row">
          <div class="col s12 center">
            <h5 class="light">Des informations sont manquantes, erronées ou confidentielles ?</h5><br>
            <a href="{{ route('startups.edit', ['startup' => $s]) }}" class="btn btn-large waves-effect waves-light"><i class="material-icons left">mode_edit</i> Corriger</a>
            <a href="{{ route('contact') }}" class="btn btn-large waves-effect waves-light"><i class="material-icons left">email</i> Nous contacter</a>
          </div>
        </div>
      </div>
    </div>
    <div class="toc-wrapper">
      <div class="hide-on-med-and-down">
        <ul class="section table-of-contents">
          <li><a href="#presentation">Présentation</a></li>
          @if ($infos) <li><a href="#infos">Informations</a></li> @endif
          @if ($network) <li><a href="#network">Réseau</a></li> @endif
          <li><a href="#suggest">Corriger</a></li>
        </ul>
      </div>
    </div>
  </main>
  @include("shared.footer")
	@include("shared.scripts")
</body>
</html>

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
          <a href="{{ route('startups.show', ['startup' => $s]) }}" class="breadcrumb">{{ $s->name_official }}</a>
					<a class="breadcrumb">Édition</a>
        </div>
      </div>
    </nav>
  </header>
  <main>

		<div class="section section-grey">
			<div class="container">
				<p class="flow-text">Remplir les champs connus puis soumettre ces informations en bas de la page.</p>

				@if (count($errors) > 0)
				<div class="card-alert error">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif

			</div>
		</div>

		<form method="POST" action="{{ route('startups.update', ['startup' => $s]) }}">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="container section">
      <div class="row">

          <div class="row">
            <div class="input-field col s12 m6">
              <input value="{{ old('name_official', $s->name_official) }}" name="name_official" id="name_official" type="text"  required>
              <label for="name_official">Nom officiel</label>
            </div>
            <div class="input-field col s12 m6">
              <input value="{{ old('name_official', $s->name_commercial) }}" name="name_commercial" id="name_commercial" type="text" >
              <label for="name_commercial">Nom commercial</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea name="description" id="description" class="materialize-textarea validate">{{ old('description', $s->description) }} </textarea>
              <label for="description">Description</label>
            </div>
          </div>
					<div class="row">
            <div class="input-field col s12">
							<input data-value="{{ old('foundation_date', $s->foundation_date) }}" name="foundation_date" type="date" class="datepicker">
							<label>Date de fondation</label>
            </div>
          </div>


      </div>
    </div>

		<div class="section section-grey">
			<div class="container">

				<div class="row">
					<div class="input-field col s6">
						<select name="field_id" class="browser-default">
							<option value="" disabled selected>Choisir un domaine</option>
							@foreach ($fields as $field)
							<option value="{{ $field->id }}">{{ $field->name }}</option>
							@endforeach
							<option value="-1">Autre</option>
						</select>
					</div>
					<div class="input-field col s6">
						<input value="{{ old('field_id_other') }}" name="field_id_other" id="field_id_other" type="text" >
						<label for="field_id_other">Autre</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<select name="department_id">
							<option value="" disabled selected>Choisir un département</option>
							@foreach ($depts as $dept)
							<option value="{{ $dept->id }}">{{ $dept->name }}</option>
							@endforeach
						</select>
						<label>Lien avec un département UTC</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s6">
						<select name="status">
							<option value="" disabled selected>Choisir un état</option>
							<option value="en cours de développement">en cours de développement</option>
							<option value="en activité">en activité</option>
							<option value="abandonné">abandonné</option>
							<option value="faillite">faillite</option>
							<option value="autre">autre</option>
						</select>
						<label>État du projet</label>
					</div>
					<div class="input-field col s6">
						<select name="legal_status">
							<option value="" disabled selected>Choisir une structure légale</option>
							@foreach ($legal_statuses as $legal_status)
							<option value="{{ $legal_status->id }}">{{ $legal_status->name }}</option>
							@endforeach
							<option value="-1">Autre</option>
						</select>
						<label>Structure légale</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12 m4">
						<input value="{{ old('NAF_code', $s->NAF_code) }}" name="NAF_code" id="NAF_code" type="text" >
						<label for="NAF_code">Code NAF</label>
					</div>
					<div class="input-field col s12 m4">
						<input value="{{ old('SIREN', $s->SIREN) }}" name="SIREN" id="SIREN" type="text" >
						<label for="SIREN">SIREN</label>
					</div>
					<div class="input-field col s12 m4">
						<input value="{{ old('SIRET', $s->SIRET) }}" name="SIRET" id="SIRET" type="text" >
						<label for="SIRET">SIRET</label>
					</div>
				</div>



			</div>
		</div>

		<div class="section section">
			<div class="container">

				<div class="row">
					<div class="input-field col s12">
						<input value="{{ old('url', $s->url) }}" name="url" id="url" type="url" >
						<label for="url">Site web (URL)</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12 m6">
						<input value="{{ old('email', $s->email) }}" name="email" id="email" type="email" >
						<label for="email">Email</label>
					</div>
					<div class="input-field col s12 m6">
						<input value="{{ old('phone', $s->phone) }}" name="phone" id="phone"  type="tel">
						<label for="phone">Téléphone</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12 m4">
						<input value="{{ old('linkedin', $s->linkedin) }}" name="linkedin" id="linkedin" type="url" >
						<label for="linkedin">Linkedin (URL)</label>
					</div>
					<div class="input-field col s12 m4">
						<input value="{{ old('twitter', $s->twitter) }}" name="twitter" id="twitter" type="url" >
						<label for="twitter">Twitter (URL)</label>
					</div>
					<div class="input-field col s12 m4">
						<input value="{{ old('facebook', $s->facebook) }}" name="facebook" id="facebook" type="url" >
						<label for="facebook">Facebook (URL)</label>
					</div>
				</div>

			</div>
		</div>

		<div class="section section-grey">
			<div class="container">

				<div class="row">
					<div class="col s12">
						<label for="editor_email">Votre email (pour vous informer lorsque vos modifications auront été acceptées)</label>
						<input value="{{ old('editor_email', '') }}" name="editor_email" id="editor_email" type="email" class="validate" required>
					</div>
				</div>

				<div class="row">
					<div class="col s12 center">
						<button type="submit" class="waves-effect waves-light btn">
							<i class="material-icons left">email</i>Soumettre
						</button>
					</div>
				</div>

			</div>
		</div>

		</form>
  </main>
  @include("shared.footer")
	@include("shared.scripts")
	<script type="text/javascript">
		$('.datepicker').pickadate({
			selectMonths: true, // Creates a dropdown to control month
			selectYears: 40,
			format: 'dd / mm / yyyy',
			formatSubmit: 'yyyy/mm/dd',
			min: [1972, 10, 2],
		 });
		 $(document).ready(function() {
		 	$('select').material_select();
		 });
	 </script>
</body>
</html>

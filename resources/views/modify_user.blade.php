@include('components.header')

        @include('components.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            @include('components.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid" dir="ltr" style="text-align : right">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">تعديل الحساب</h1><br>
					<div class="form quick-post">
							<!-- Edit profile form (not working)-->
						<form class="form-horizontal" action="../update_user" method="POST">
								@csrf

							<!-- Title -->
							<input type="hidden" name="id" value="{{ $u->id}}">
							<div class="form-group row">
								<label class="control-label col-lg-4 text-right" for="title">Nom et Prénom</label>
								<div class="col-lg-8">
								<input required="" type="text" class="form-control" value="{{ $u->full_name}}" id="full_name" name="full_name">
								</div>
							</div>
							<!-- Content -->
							<div class="form-group row">
								<label class="control-label col-lg-4 text-right" for="content">Username</label>
								<div class="col-lg-8">
								<input required="" type="text" value="{{ $u->username}}" class="form-control" id="username" name="username">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-lg-4 text-right" for="content">Mot de passe</label>
								<div class="col-lg-8">
								<input required="" type="text" value="{{ $pwd}}" class="form-control" id="password" name="password">
								</div>
							</div>
							<!-- Cateogry -->
							<div class="form-group row" style="display : none">
								<label class="control-label col-lg-4 text-right">Position</label>
								<div class="col-lg-8">
								<select  class="form-control" name="position">
									<option selected style="visibility: hidden;"  value="{{$u->position}}">{{$u->position}}</option>
									<option value="Employé">Employé</option>
									<option value="Chef de service">Chef de service</option>
									<option value="Directeur">Directeur</option>
									<option value="Admin">Admin</option>
									</select>
								</div>
							</div>
							<?php $clss =""; ?>
							@if($user->service !="Chef des Labos")
							<?php $clss = "disabled";  ?>
							@endif
							<div class="form-group row">
								<label class="control-label col-lg-4 text-right">Role</label>
								<div class="col-lg-8">
								<select {{$clss}} required="" class="form-control" name="service">
									<option selected style="visibility: hidden;" value="{{$u->service}}">{{$u->service}}</option>
									<option value="Ingenieur">Ingenieur</option>
									<option value="Chef des Labos">Chef des Labos</option>
									<option value="Chef de Departement">Chef de Departement</option>
									<option value="Doyen">Doyen</option>
									<option value="SG">Secretaire Générale</option>
									<option value="Responsable des Moyen">Responsable des Moyen</option>
									</select>
								</div>
							</div>
							<div class="form-group row" style="display : none">
								<label class="control-label col-lg-4 text-right" for="content">Chapitre</label>
								<div class="col-lg-8">
								<input type="text" value="{{$u->chapitre}}" class="form-control" id="chapitre" name="chapitre">
								</div>
							</div>
							<!-- Buttons -->
							<div class="form-group row">
								<!-- Buttons -->
								<div class="col-lg-offset-2 col-lg-9">
								<button type="submit" class="btn btn-primary">Enregistrer</button>
								</div>
							</div>
						</form>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @include('components.footer')
<script type="text/javascript">
window.onload = function(){
	document.getElementById('loading').style.display = "none";
};
</script>


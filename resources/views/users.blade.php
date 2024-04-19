@include('components.header')

        @include('components.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            @include('components.topbar')
                <!-- Begin Page Content -->
                <div class="container-fluid" dir="ltr" style="text-align : left">

				<div class="panel-body">
					<div class="padd">
						<div style="text-align : right" class="col-lg-12 task-progress pull-right">
							<h3>إضافة حساب </h3><br>
						</div>
						<div class="form quick-post">
							<!-- Edit profile form (not working)-->
							<form class="form-horizontal" autocomplete="off" action="add_user" method="POST">
								@csrf
							<!-- Title -->
							<div class="form-group row">
								<label class="control-label col-lg-2" for="title">Nom et Prénom</label>
								<div class="col-lg-10">
								<input required="" type="text" class="form-control" id="full_name" name="full_name">
								</div>
							</div>
							<!-- Content -->
							<div class="form-group row">
								<label class="control-label col-lg-2" for="content">Username</label>
								<div class="col-lg-10">
								<input required="" type="text" class="form-control" id="username" name="username">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-lg-2" for="content">Mot de passe</label>
								<div class="col-lg-10">
								<input required="" type="password" class="form-control" id="password" name="password">
								</div>
							</div>
							<!-- Cateogry -->
							<div class="form-group row" style="display : none">
								<label class="control-label col-lg-2">Position</label>
								<div class="col-lg-10">
								<select required="" class="form-control" name="position">
									<option selected value="Employé">Employé</option>
									<option value="Chef de service">Chef de service</option>
									<option value="Directeur">Directeur</option>
									<option value="Admin">Admin</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-lg-2">Role</label>
								<div class="col-lg-10">
								<select required="" class="form-control" name="service">
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
								<label class="control-label col-lg-2" for="content">Chapitre</label>
								<div class="col-lg-10">
								<input type="text" class="form-control" id="chapitre" name="chapitre">
								</div>
							</div>
							<!-- Buttons -->
							<div class="form-group row">
								<!-- Buttons -->
								<div class="col-lg-offset-2 col-lg-9">
								<button type="submit" class="btn btn-primary">Ajouter</button>
								<button type="reset" class="btn btn-default">Annuler</button>
								</div>
							</div>
							</form>
						</div>
						</div>
					</div>

					<section class="panel">
						<div class="panel-body progress-panel">
							<div class="row">
							<div style="text-align : right" class="col-lg-12 task-progress pull-right">
								<h3>حسابات المستخدمين</h3>
							</div>
							</div>
						</div>
						<br>
						<table class="table table-hover personal-task">
							<tbody>
							<tr>
								<td>Nom et Prénom</td>
								<td>Username</td>
								<td>Role</td>
								<td>Modifier</td>
							</tr>
							@foreach($users as $u)
							<tr>
								<td><span class="profile-ava">
										<img alt="" style="width: 30px; height: 30px;" class="simple" src="{{ $u->photo }}">
									</span>
									<span>{{ $u->full_name }}</span>

								</td>
								<td>
									<span>{{ $u->username }}</span>
								</td>
								<td>
									<span>{{ $u->service }}</span>
								</td>
								<td>
									<span><a  class="btn btn-primary" href="/modify_user/{{ $u->id }}" >Modifier</a></span>
								</td>
							</tr> 
							@endforeach  
							</tbody>
						</table>
					</section>

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

@include('components.header')
<style type="text/css">
    .table-bordered th, .table-bordered td {
        border: 1px solid black;
        vertical-align : middle;
    }
    .table thead th {
        border-bottom : 1px solid black;
    }
    .table-responsive {
        transform: rotateX(180deg);
        overflow-x: auto;
    } 
    .table {
        transform: rotateX(180deg);
    }
    a.disabled {
        pointer-events: none;
    }
</style>
        @include('components.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            @include('components.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid" dir="rtl" style="text-align : right">

                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"> تثبيت الأشخاص المعوقين </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" >
                                <table class="table table-bordered" id="dataTable" cellspacing="0" 
                                style="width : 100%; text-align : center; color : black; font-size : 14px;">
                                    <thead style="background-color : lightblue;">
                                        <tr>
                                            <th>اللقب</th>
                                            <th>الاسم</th>
                                            <th>تاريخ و مكان الإزدياد</th>
                                            <th>طبيعة الإعاقة</th>
                                            <th>نسبة الإعاقة</th>   
                                            <th>تثبيت</th>  
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($patients as $patient)
                                        <tr>
                                            <td>{{$patient->nom}}</td>
                                            <td>{{$patient->prenom}}</td>
                                            <td>{{$patient->date_naissance}}<br> بـ{{$patient->lieu_naissance}}</td>
                                            <td>{{$patient->name_handicap}}</td>
                                            <td>{{$patient->taux}} %</td>
                                            <td><a class="btn btn-info" href="/validate_patient/{{$patient->id_patient}}">تثبيت</a></td>
      
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @include('components.footer')
<script src="{{ url('js/sweetalert2.min.js') }}"></script> 
<script type="text/javascript">
window.onload = function(){
	document.getElementById('loading').style.display = "none";
};
function supprimer(link){
  Swal.fire({
      title: "هل أنت متأكد من أنك تريد الحذف ؟",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "نعم",
      cancelButtonText: "إلغاء"
    }).then((result) => {
      if (result.isConfirmed) {
        document.location.href = link;
      }
    });

}
</script>
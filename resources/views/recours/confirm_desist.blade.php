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
    .btn {
       padding :  0.50rem 0.25rem;
       font-size : 13px;
    }
</style>
        @include('components.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            @include('components.topbar')
            <div class="form-group row" dir="rtl" style="justify-content : center;">
                <div class="form-group" style="width : 300px;">
                    <input id="op_input" autocomplete="off" dir="rtl" placeholder="الاسم و اللقب" list="ops" class="form-control"  onclick="op_like(this.value)" onkeyup="op_like(this.value)" > 
                    <div id="myDropdown" class="dropdown-content" style="display: none;">
                    @foreach ($patients0 as $patient)
                    <span class="ops_clss" style="cursor: pointer;" onclick="filter('{{ $patient->id_patient }}')">{{$patient->nom}} {{$patient->prenom}}</span>
                    @endforeach
                    </div>
                </div>
            </div>
                <!-- Begin Page Content -->
                <div class="container-fluid" dir="rtl" style="text-align : right">

                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">تثبيت التنازلات</h6>
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
                                            <th>تم إدخال التنازل من طرف</th>   
                                            <th>تاريخ التنازل</th>  
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
                                            <td>{{$patient->full_name}}</td>
                                            <td>{{$patient->desistement}}</td>
                                            <td><a class="btn btn-info" href="/confirm_desistement/{{$patient->id_patient}}"> تثبيت </a></td>
        
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
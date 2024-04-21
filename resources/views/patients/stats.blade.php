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
</style>

<?php 

function get_stat($patients,$handicap,$min,$max,$sexe){

    $s = 0;

    foreach( $patients as $patient){

        if($patient->handicap == $handicap && $patient->sexe == $sexe){
            if($patient->age >= $min && $patient->age < $max){
                $s = $s+1;
            }
        }
    }
    return $s;
} 
?>
        @include('components.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            @include('components.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid" dir="rtl" style="text-align : right">
                    <h4 style="text-align : center;">العدد الإجمالي للأشخاص ذوي الإعاقة الحاملين لبطاقة "الشخص المعوق" الموزعين
                                حسب طبيعة الإعاقة و الفئة العمرية و الجنس
                    </h4><br>

                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                العدد الإجمالي للأشخاص ذوي الإعاقة بنسبة %100 الحاملين لبطاقة الشخص المعوق
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" >
                                <table class="table table-bordered" id="dataTable" cellspacing="0" 
                                style="width : 100%; text-align : center; color : black; font-size : 14px;">
                                    <thead style="background-color : lightblue;">
                                        <tr>
                                            <th rowspan="2"></th>
                                            <th colspan="2">من 0 إلى 3 سنوات</th>
                                            <th colspan="2">من 3 إلى 5 سنوات</th>
                                            <th colspan="2">من 5 إلى 18 سنوات</th>
                                            <th colspan="2">من 18 إلى 35 سنوات</th>
                                            <th colspan="2">من 35 إلى 60 سنوات</th>
                                            <th colspan="2">أكثر من 60 سنة</th>
                                            <th colspan="2">المجموع</th>
                                            <th rowspan="2">المجموع</th>
                                        </tr>
                                        <tr>
                                            <th>ذكر</th>
                                            <th>أنثى</th>
                                            <th>ذكر</th>
                                            <th>أنثى</th>
                                            <th>ذكر</th>
                                            <th>أنثى</th>
                                            <th>ذكر</th>
                                            <th>أنثى</th>
                                            <th>ذكر</th>
                                            <th>أنثى</th>
                                            <th>ذكر</th>
                                            <th>أنثى</th>
                                            <th>ذكر</th>
                                            <th>أنثى</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($handicaps as $handicap)
                                        <tr>
                                            <td>{{$handicap->name_handicap}}</td>
                                            <td>{{get_stat($patients,$handicap->id_handicap,0,3,"ذكر")}}</td>
                                            <td>{{get_stat($patients,$handicap->id_handicap,0,3,"أنثى")}}</td>
                                            <td>{{get_stat($patients,$handicap->id_handicap,3,5,"ذكر")}}</td>
                                            <td>{{get_stat($patients,$handicap->id_handicap,3,5,"أنثى")}}</td>
                                            <td>{{get_stat($patients,$handicap->id_handicap,5,18,"ذكر")}}</td>
                                            <td>{{get_stat($patients,$handicap->id_handicap,5,18,"أنثى")}}</td>
                                            <td>{{get_stat($patients,$handicap->id_handicap,18,35,"ذكر")}}</td>
                                            <td>{{get_stat($patients,$handicap->id_handicap,18,35,"أنثى")}}</td>
                                            <td>{{get_stat($patients,$handicap->id_handicap,35,60,"ذكر")}}</td>
                                            <td>{{get_stat($patients,$handicap->id_handicap,35,60,"أنثى")}}</td>
                                            <td>{{get_stat($patients,$handicap->id_handicap,60,3500000,"ذكر")}}</td>
                                            <td>{{get_stat($patients,$handicap->id_handicap,60,3500000,"أنثى")}}</td>
                                            
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td>المجموع</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                      <!-- Page Heading -->
                      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                العدد الإجمالي للأشخاص ذوي الإعاقة بنسبة أقل من %100 الحاملين لبطاقة الشخص المعوق
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" >
                                <table class="table table-bordered" id="dataTable" cellspacing="0" 
                                style="width : 100%; text-align : center; color : black; font-size : 14px;">
                                    <thead style="background-color : lightblue;">
                                        <tr>
                                            <th rowspan="2"></th>
                                            <th colspan="2">من 0 إلى 3 سنوات</th>
                                            <th colspan="2">من 3 إلى 5 سنوات</th>
                                            <th colspan="2">من 5 إلى 18 سنوات</th>
                                            <th colspan="2">من 18 إلى 35 سنوات</th>
                                            <th colspan="2">من 35 إلى 60 سنوات</th>
                                            <th colspan="2">أكثر من 60 سنة</th>
                                            <th colspan="2">المجموع</th>
                                            <th rowspan="2">المجموع</th>
                                        </tr>
                                        <tr>
                                            <th>ذكر</th>
                                            <th>أنثى</th>
                                            <th>ذكر</th>
                                            <th>أنثى</th>
                                            <th>ذكر</th>
                                            <th>أنثى</th>
                                            <th>ذكر</th>
                                            <th>أنثى</th>
                                            <th>ذكر</th>
                                            <th>أنثى</th>
                                            <th>ذكر</th>
                                            <th>أنثى</th>
                                            <th>ذكر</th>
                                            <th>أنثى</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($handicaps as $handicap)
                                        <tr>
                                            <td>{{$handicap->name_handicap}}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td>المجموع</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            
                                        </tr>
                                        <tr style="background-color : lightgray;">
                                            <th>المجموع الكلي</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            
                                        </tr>
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
<script type="text/javascript">
window.onload = function(){
	document.getElementById('loading').style.display = "none";
};
</script>
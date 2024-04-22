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
    .table td {
        font-weight : bold;
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
                                        @foreach($stats as $handicap)
                                        <tr>
                                            <td>{{$handicap->name_handicap}}</td>
                                            <td>{{$handicap->stats_0_3_m}}</td>
                                            <td>{{$handicap->stats_0_3_f}}</td>
                                            <td>{{$handicap->stats_3_5_m}}</td>
                                            <td>{{$handicap->stats_3_5_f}}</td>
                                            <td>{{$handicap->stats_5_18_m}}</td>
                                            <td>{{$handicap->stats_5_18_f}}</td>
                                            <td>{{$handicap->stats_18_35_m}}</td>
                                            <td>{{$handicap->stats_18_35_f}}</td>
                                            <td>{{$handicap->stats_35_60_m}}</td>
                                            <td>{{$handicap->stats_35_60_f}}</td>
                                            <td>{{$handicap->stats_60_m}}</td>
                                            <td>{{$handicap->stats_60_f}}</td>
                                            <td>{{$handicap->total_handicap_m}}</td>
                                            <td>{{$handicap->total_handicap_f}}</td>
                                            <td>{{$handicap->total_handicap}}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td>المجموع</td>
                                            <td id="tot_1">{{array_sum(array_column($stats,"stats_0_3_m"))}}</td>
                                            <td id="tot_2">{{array_sum(array_column($stats,"stats_0_3_f"))}}</td>
                                            <td id="tot_3">{{array_sum(array_column($stats,"stats_3_5_m"))}}</td>
                                            <td id="tot_4">{{array_sum(array_column($stats,"stats_3_5_f"))}}</td>
                                            <td id="tot_5">{{array_sum(array_column($stats,"stats_5_18_m"))}}</td>
                                            <td id="tot_6">{{array_sum(array_column($stats,"stats_5_18_f"))}}</td>
                                            <td id="tot_7">{{array_sum(array_column($stats,"stats_18_35_m"))}}</td>
                                            <td id="tot_8">{{array_sum(array_column($stats,"stats_18_35_f"))}}</td>
                                            <td id="tot_9">{{array_sum(array_column($stats,"stats_35_60_m"))}}</td>
                                            <td id="tot_10">{{array_sum(array_column($stats,"stats_35_60_f"))}}</td>
                                            <td id="tot_11">{{array_sum(array_column($stats,"stats_60_m"))}}</td>
                                            <td id="tot_12">{{array_sum(array_column($stats,"stats_60_f"))}}</td>
                                            <td id="tot_13">{{array_sum(array_column($stats,"total_handicap_m"))}}</td>
                                            <td id="tot_14">{{array_sum(array_column($stats,"total_handicap_f"))}}</td>
                                            <td id="tot_15">{{array_sum(array_column($stats,"total_handicap"))}}</td>
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
                                    @foreach($stats_2 as $handicap)
                                        <tr>
                                            <td>{{$handicap->name_handicap}}</td>
                                            <td>{{$handicap->stats_0_3_m}}</td>
                                            <td>{{$handicap->stats_0_3_f}}</td>
                                            <td>{{$handicap->stats_3_5_m}}</td>
                                            <td>{{$handicap->stats_3_5_f}}</td>
                                            <td>{{$handicap->stats_5_18_m}}</td>
                                            <td>{{$handicap->stats_5_18_f}}</td>
                                            <td>{{$handicap->stats_18_35_m}}</td>
                                            <td>{{$handicap->stats_18_35_f}}</td>
                                            <td>{{$handicap->stats_35_60_m}}</td>
                                            <td>{{$handicap->stats_35_60_f}}</td>
                                            <td>{{$handicap->stats_60_m}}</td>
                                            <td>{{$handicap->stats_60_f}}</td>
                                            <td>{{$handicap->total_handicap_m}}</td>
                                            <td>{{$handicap->total_handicap_f}}</td>
                                            <td>{{$handicap->total_handicap}}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td>المجموع</td>
                                            <td id="tot2_1">{{array_sum(array_column($stats_2,"stats_0_3_m"))}}</td>
                                            <td id="tot2_2">{{array_sum(array_column($stats_2,"stats_0_3_f"))}}</td>
                                            <td id="tot2_3">{{array_sum(array_column($stats_2,"stats_3_5_m"))}}</td>
                                            <td id="tot2_4">{{array_sum(array_column($stats_2,"stats_3_5_f"))}}</td>
                                            <td id="tot2_5">{{array_sum(array_column($stats_2,"stats_5_18_m"))}}</td>
                                            <td id="tot2_6">{{array_sum(array_column($stats_2,"stats_5_18_f"))}}</td>
                                            <td id="tot2_7">{{array_sum(array_column($stats_2,"stats_18_35_m"))}}</td>
                                            <td id="tot2_8">{{array_sum(array_column($stats_2,"stats_18_35_f"))}}</td>
                                            <td id="tot2_9">{{array_sum(array_column($stats_2,"stats_35_60_m"))}}</td>
                                            <td id="tot2_10">{{array_sum(array_column($stats_2,"stats_35_60_f"))}}</td>
                                            <td id="tot2_11">{{array_sum(array_column($stats_2,"stats_60_m"))}}</td>
                                            <td id="tot2_12">{{array_sum(array_column($stats_2,"stats_60_f"))}}</td>
                                            <td id="tot2_13">{{array_sum(array_column($stats_2,"total_handicap_m"))}}</td>
                                            <td id="tot2_14">{{array_sum(array_column($stats_2,"total_handicap_f"))}}</td>
                                            <td id="tot_15">{{array_sum(array_column($stats_2,"total_handicap"))}}</td>
                                        </tr>
                                        <tr style="background-color : lightgray;" id="some_total">

                                            
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
    //total();
};
function total(){
    str = "<th>المجموع الكلي</th>";
    for(var i =1; i< 16; i++){
        s = parseInt(document.getElementById('tot_'+i).innerHTML) + parseInt(document.getElementById('tot2_'+i).innerHTML);
        str += "<th>"+s+"</th>";
    }
    document.getElementById("some_total").innerHTML = str;
}
</script>
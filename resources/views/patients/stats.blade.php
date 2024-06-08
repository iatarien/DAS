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
            <div class="form-group row" dir="rtl" style="justify-content : center;">
                <label style="display : flex; justify-content : left; align-items : end;" class="control-label col-md-1">السنة</label>
                <select style="text-align : center;" onchange="year_changed(this.value)" class="form-control col-md-2">
                    @if(isset($annee))
                        @if($annee =="all")
                            <option style="visibility : hidden" value="all">جميع السنوات</option>
                        @else
                            <option style="visibility : hidden">{{$annee}}</option>
                        @endif
                    @endif
                    <option value="all">جميع السنوات</option>
                    <?php for($i = 2000; $i < 2150; $i++){ ?>
                        <option>{{$i}}</option>
                    <?php } ?>
                    </select>
            </div>
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
                                        <tr style='background-color : lightgray;'>
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

                                    <tbody id="stats_2_table">

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
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php for($i =1; $i < 16; $i++){
               // echo "<td id='tot_".$i."'>data.tot_".$i."</td>\n";
            } ?>
            @include('components.footer')
<script type="text/javascript">
window.onload = function(){
    get_stats();
};

function year_changed(value){
    window.location.href ="/stats/"+value;
}

function get_stats(){
    year = "{{$annee}}";
    link = "/get_stats/"+year;
    $.ajax({
        url: link,
        method: "GET",  
        success: function(response) {
            console.log(response);
            display(response);
            total();
            document.getElementById('loading').style.display = "none";
        },
        error: function(error) {
            console.log(error);
        }
    });
}
function display(data){
    str = "";
    stats = data.tab;
    for(var i =0; i < stats.length; i++){
        handicap = stats[i];
        str +="<tr><td>"+handicap.name_handicap+"</td>"+
        "<td>"+handicap.stats_0_3_m+"</td>"+
        "<td>"+handicap.stats_0_3_f+"</td>"+
        "<td>"+handicap.stats_3_5_m+"</td>"+
        "<td>"+handicap.stats_3_5_f+"</td>"+
        "<td>"+handicap.stats_5_18_m+"</td>"+
        "<td>"+handicap.stats_5_18_f+"</td>"+
        "<td>"+handicap.stats_18_35_m+"</td>"+
        "<td>"+handicap.stats_18_35_f+"</td>"+
        "<td>"+handicap.stats_35_60_m+"</td>"+
        "<td>"+handicap.stats_35_60_f+"</td>"+
        "<td>"+handicap.stats_60_m+"</td>"+
        "<td>"+handicap.stats_60_f+"</td>"+
        "<td>"+handicap.total_handicap_m+"</td>"+
        "<td>"+handicap.total_handicap_f+"</td>"+
        "<td>"+handicap.total_handicap+"</td></tr>";
    }
    str+="<tr style='background-color : lightgray;'><td>المجموع</td>"+
    "<td id='tot2_1'>"+data.tot2_1+"</td>"+
    "<td id='tot2_2'>"+data.tot2_2+"</td>"+
    "<td id='tot2_3'>"+data.tot2_3+"</td>"+
    "<td id='tot2_4'>"+data.tot2_4+"</td>"+
    "<td id='tot2_5'>"+data.tot2_5+"</td>"+
    "<td id='tot2_6'>"+data.tot2_6+"</td>"+
    "<td id='tot2_7'>"+data.tot2_7+"</td>"+
    "<td id='tot2_8'>"+data.tot2_8+"</td>"+
    "<td id='tot2_9'>"+data.tot2_9+"</td>"+
    "<td id='tot2_10'>"+data.tot2_10+"</td>"+
    "<td id='tot2_11'>"+data.tot2_11+"</td>"+
    "<td id='tot2_12'>"+data.tot2_12+"</td>"+
    "<td id='tot2_13'>"+data.tot2_13+"</td>"+
    "<td id='tot2_14'>"+data.tot2_14+"</td>"+
    "<td id='tot2_15'>"+data.tot2_15+"</td></tr>";

    str+= '<tr style="background-color : #6082B6;" id="some_total"></tr>';
    document.getElementById('stats_2_table').innerHTML = str;
}
function total(){
    str = "<th>المجموع الكلي</th>";
    for(var i =1; i< 16; i++){
        s = parseInt(document.getElementById('tot_'+i).innerHTML) + parseInt(document.getElementById('tot2_'+i).innerHTML);
        str += "<th>"+s+"</th>";
    }
    document.getElementById("some_total").innerHTML = str;
}
</script>
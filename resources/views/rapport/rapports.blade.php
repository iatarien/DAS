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
                            <h6 class="m-0 font-weight-bold text-primary">التقرير اليومي</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" >
                                <table class="table table-bordered" id="dataTable" cellspacing="0" 
                                style="width : 1200px; text-align : center; color : black; font-size : 14px;">
                                    <thead style="background-color : lightblue;">
                                        <tr>
                                            <th style="width : 120px">التاريخ و الوقت</th>
                                            <th>المخبر</th>
                                            <th>المھندس المتابع</th>
                                            <th>النشاط</th>
                                            <th>نوعه</th>
                                            <th>المستوى</th>
                                            <th>المقیاس</th>
                                            <th>موضوع العمل</th>
                                            <th>الأجهزة و الأدوات المستعملة</th>
                                            <th>نوع التكفل</th>                                                
                                            <th>الحالة قبل الإستلام</th>
                                            <th>رأي المستلم</th>
                                            <th>الحالة بعد الإستلام</th>
                                            <th>قائمة المواد الكيميائية</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($rapports as $rapport)
                                        <tr>
                                            <td rowspan="{{$rapport->n}}">{{$rapport->date}}
                                                <br><strong>{{$rapport->time}}</strong></td>
                                            <td rowspan="{{$rapport->n}}">{{$rapport->name_labo}}</td>
                                            @if($rapport->engineer =="all")
                                            <td rowspan="{{$rapport->n}}">جميع المهندسين</td>
                                            @else
                                            <td rowspan="{{$rapport->n}}">{{$rapport->full_name}}</td>
                                            @endif
                                            <td rowspan="{{$rapport->n}}">{{$rapport->ze_activity}}</td>
                                            <td rowspan="{{$rapport->n}}">{{$rapport->type_activity}}</td>
                                            <td rowspan="{{$rapport->n}}">{{$rapport->name_niveau}}</td>
                                            <td rowspan="{{$rapport->n}}">{{$rapport->name_module}}</td>
                                            <td rowspan="{{$rapport->n}}">{{$rapport->sujet_trav}}</td>
                                            @if(isset($rapport->outils[0]))
                                            <?php $outil = $rapport->outils[0]; ?>
                                            <td>{{$outil->name_tool}}<br><span style="color: blue">{{$outil->inventaire}}</span></td>
                                            <td>{{$outil->charge}}</td>
                                            <td>{{$outil->state_av}}</td>
                                            <td>{{$outil->avis}}</td>
                                            <td>{{$outil->state_after}}</td>
                                            @else
                                            <td>/</td>
                                            <td>/</td>
                                            <td>/</td>
                                            <td>/</td>
                                            <td>/</td>
                                            @endif
                                            <td rowspan="{{$rapport->n}}" style="vertical-align : middle">
                                            @if($rapport->m == 0)
                                            لا شيئ
                                            @endif
                                            <?php $max = count($rapport->chemicals); $i =0; ?>
                                            @foreach($rapport->chemicals as $chemical)
                                                <span>{{$chemical->name_chemical}} ({{$chemical->qty}} {{$chemical->unity}})</span>
                                                @if($chemical->quantity_now == 0)
                                                <span style="color : red">(استهلكت)</span>
                                                @endif
                                                
                                                <?php $i++; ?>
                                                @if( $i < $max )
                                                    <hr style="background-color : black;">
                                                @endif
                                            @endforeach
                                            </td>
                                        </tr>
                                            <?php $outils = json_decode(json_encode($rapport->outils), true); ;
                                            array_shift($outils); ?>
                                            @foreach($outils as $outil)
                                            <?php $outil = (object) $outil; ?>
                                            <tr>
                                            <td>{{$outil->name_tool}}<br><span style="color: blue">{{$outil->inventaire}}</span></td>
                                                <td>{{$outil->charge}}</td>
                                                <td>{{$outil->state_av}}</td>
                                                <td>{{$outil->avis}}</td>
                                                <td>{{$outil->state_after}}</td>
                                            </tr>
                                            @endforeach
                                            
       
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
<script type="text/javascript">
window.onload = function(){
	document.getElementById('loading').style.display = "none";
};
</script>
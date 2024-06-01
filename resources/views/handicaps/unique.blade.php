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
                <div align="center">
                    <a href="/ajouter_handicap/" 
                    class="btn btn-primary">
                    إضافة إعاقة </a>
                </div>
                <br>
                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">الإعاقات</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" >
                                <table class="table table-bordered" id="dataTable" cellspacing="0" 
                                style="width : 100%; text-align : center; color : black; font-size : 14px;">
                                    <thead style="background-color : lightblue;">
                                        <tr>
                                            <th>N°</th>
                                            <th> Query</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>

                                    <tbody dir="ltr">
                                        <?php $i = 0?>
                                        @foreach($handicaps0 as $handicap)
                                            @if(!is_numeric($handicap->handicap))
                                                <?php $i++?>
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>INSERT INTO handicap VALUES (NULL,"{{$handicap->handicap}}",NULL,0);</td>
                                                    <td>{{$handicap->total}}</td>
                                                </tr>
                                            @endif
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">الإعاقات</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" >
                                <table class="table table-bordered" id="dataTable" cellspacing="0" 
                                style="width : 100%; text-align : center; color : black; font-size : 14px;">
                                    <thead style="background-color : lightblue;">
                                        <tr>
                                            <th>id</th>
                                            <th>اسم الإعاقة</th>
                                            <th>رمز الإعاقة</th>
                                            <th>نسبة الإعاقة الدنيا</th>
                                            <th>تعديل</th>  
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach($handicaps as $handicap)
                                        <tr>
                                            <td>{{$handicap->id_handicap}}</td>
                                            <td>{{$handicap->name_handicap}}</td>
                                            <td>{{$handicap->acronym}}</td>
                                            <td>{{$handicap->threshold}}</td>
                                            <td><a class="btn btn-info" href="/modifier_handicap/{{$handicap->id_handicap}}">تعديل</a></td>
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

</script>
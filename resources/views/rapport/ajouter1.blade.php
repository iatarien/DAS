@include('components.header')

        @include('components.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            @include('components.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid" dir="rtl" style="text-align : right">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">إضافة تقرير</h6>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="/insert_rapport" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title">التاريخ</label>
                                    <div class="col-lg-8">
                                    <input value="<?php echo date('Y-m-d'); ?>" style="text-align : right" required="" type="date" class="form-control"  name="date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title">الوقت</label>
                                    <div class="col-lg-8">
                                    <select name="time" class="form-control">
                                            <option>8:00 - 9:30</option>
                                            <option>9:30 - 11:00</option>
                                            <option>11:00 - 12:30</option>
                                            <option>12:30 - 14:00</option>
                                            <option>14:00 - 15:30</option>
                                            <option>15:30 - 17:00</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title">المخبر</label>
                                    <div class="col-lg-8">
                                    <select name="labo" class="form-control">
                                        @foreach($labos as $labo)
                                            <option value="{{$labo->id_labo}}"> {{$labo->name_labo}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title">المهندس المتابع</label>
                                    <div class="col-lg-8">
                                    <select name="engineer" class="form-control" onchange="changed_eng(this.value)">
                                        <option value="all">جميع المهندسين</option>
                                        <option value="{{$user->id}}">بعض المهندسين</option>
                                    </select>
                                    </div>
                                </div>
                                <div id="some" style="display : none"  class="form-group row">
                                    <label  class="control-label col-lg-2 text-right" for="title">المهندسين المتابعين</label>
                                    <div class="col-lg-8">
                                    <input type="text" class="form-control" readonly value ="{{$user->full_name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title">النشاط</label>
                                    <div class="col-lg-8">
                                    <select name="activite" class="form-control">
                                        <option value="نشاط بيداغوجي"> نشاط بيداغوجي</option>
                                        <option value="أخرى"> أخرى</option>
                                        <option value="لا شيئ ">لا شيئ </option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group" align="center">
                                <button class="btn btn-primary" type="submit">التالي</button>
                                </div>
                            </from>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @include('components.footer')
<script type="text/javascript">
function changed_eng(val){
    if(val =="all"){
        document.getElementById('some').style.display ='none';
    }else{
        document.getElementById('some').style.display ='flex';
    } 
}
window.onload = function(){
	document.getElementById('loading').style.display = "none";
};
</script>
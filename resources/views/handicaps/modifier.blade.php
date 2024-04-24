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
                            <h6 class="m-0 font-weight-bold text-primary">تعديل إعاقة</h6>
                        </div>
                        <div class="card-body">
                            <form autocomplete="off" class="form-horizontal" action="/update_handicap" method="POST" >
                                @csrf
                                <input type="hidden" name="id" value="{{$handicap->id_handicap}}" >
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title">اسم الإعاقة</label>
                                    <div class="col-lg-8">
                                        <input style="text-align : right" required="" 
                                        value="{{$handicap->name_handicap}}"
                                        type="text" class="form-control"  name="name_handicap">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title">ترميز الإعاقة</label>
                                    <div class="col-lg-8">
                                        <input style="text-align : right" required="" 
                                        value="{{$handicap->acronym}}"
                                        type="text" class="form-control"  name="acronym">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title"> نسبة الإعاقة الدنيا</label>
                                    <div class="col-lg-8">
                                        <input style="text-align : right" dir="ltr" required="" 
                                        value="{{$handicap->threshold}}"
                                        type="number" class="form-control"  name="threshold">
                                    </div>
                                </div>
                               <div class="form-group" align="center">
                                    <button class="btn btn-primary" type="submit">حفظ</button>
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

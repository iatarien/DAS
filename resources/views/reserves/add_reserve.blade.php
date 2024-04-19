@include('components.header')


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            @include('components.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid" dir="rtl" style="text-align : right">

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">إضافة تحفظ</h6>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="/insert_reserve" method="POST">
                                @csrf
                                <input type="hidden" name="rapport" value="{{$rapport}}">
                                <input type="hidden" name="outil" value="{{$outil}}">
                                <input type="hidden" name="state" value="{{$state}}">
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title">موضوع التحفظ</label>
                                    <div class="col-lg-8">
                                        <textarea class="form-control" name="sujet_res" rows = "6"></textarea>
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

window.onload = function(){
	document.getElementById('loading').style.display = "none";
};
</script>
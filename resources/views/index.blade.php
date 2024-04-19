@include('components.header')

        @include('components.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            @include('components.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid" dir="rtl" style="text-align : right">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">المشاريع</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">برنامج مشاريع الصفقات العمومية 2024 للدراسات</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width : 20%">اسم المشروع</th>
                                            <th>الاجراء</th>
                                            <th>تاريخ تسجيل العملية او التبيغ</th>
                                            <th>تاريخ ايداع دفتر الشروط</th>
                                            <th>رقم تأشيرة دفتر الشروط</th>
                                            <th>تاريخ تأشيرة دفتر الشروط</th>
                                            <th>تاريخ الاعلان عن المسابقة </th>
                                            <th>مدة تحضير ملف الترشح</th>
                                            <th>تاريخ محضر تاهيل الترشح</th>
                                            <th>تاريخ اعلان الانتقاء الاولي</th>
                                            <th>مدة تحضير عروض الخدمات + التقني +المالي</th>
                                            <th>تاريخ فتح العرض التقني</th>
                                            <th>رقم محضر التحليل التقني</th>
                                            <th>تاريخ محضر التحليل التقني</th>
                                            <th>تاريخ  عروض الخدمات (لجنة التحكيم)</th>
                                            <th>رقم المحضر النهائي</th>
                                            <th>تاريخ المحضر النهائي</th>
                                            <th>رقم رسالة تكملة الوثائق التبريرية</th>
                                            <th>تاريخ رسالة تكملة الوثائق التبريرية</th>
                                            <th>تاريخ اعلان المنح المؤقت</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        
                                        <tr>
                                            <td></td>
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
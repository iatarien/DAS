<!-- Sidebar -->
<ul dir="rtl" style="padding-right : 15px;" class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Divider -->

<br><br><br><br>


<!-- Divider -->

<hr class="sidebar-divider">
<!-- Nav Item - Tables -->
<li class="nav-item active">
    <a class="nav-link" href="/add_patient">
        <i class="fas fa-fw fa-pen"></i>
        <span>إضافة شخص معوق</span></a>
</li>

<hr class="sidebar-divider">
<li class="nav-item active">
    <a class="nav-link" href="/validate_patients">
        <i class="fas fa-fw fa-check"></i>
        <span>تثبيت أو رفض</span></a>
</li>
<hr class="sidebar-divider">

<li class="nav-item active">
    <a class="nav-link" href="/patients">
        <i class="fas fa-fw fa-copy"></i>
        <span>الأشخاص غير المثبتين</span></a>
</li>
<hr class="sidebar-divider">
<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="/validated_patients">
        <i class="fas fa-fw fa-id-card"></i>
        <span> طباعة البطاقات </span></a>
</li>
<hr class="sidebar-divider">
<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="/rejected_patients">
        <i class="fas fa-fw fa-calendar"></i>
        <span> غير المستفيدين</span></a>
</li>
<hr class="sidebar-divider">
<!-- Nav Item - Tables -->
<li class="nav-item active">
    <a class="nav-link" href="/stats/{{Date('Y')}}">
        <i class="fas fa-fw fa-table"></i>
        <span>حصيلة إجمالية</span></a>
</li>
<!-- Nav Item - Dashboard -->
<hr class="sidebar-divider">
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-bolt"></i>
        <span>الطعون</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div dir="rtl"  class="py-2 collapse-inner rounded">
            <a style="color : white; text-align : right;" class="collapse-item" href="/select/recours">إضافة طعن</a>
            <a style="color : white; text-align : right;" class="collapse-item" href="/confirm_recours"> تثبيت الطعون</a>
            <a style="color : white; text-align : right;" class="collapse-item" href="/recours_not">الطعون غير المثبتة</a>
            <a style="color : white; text-align : right;" class="collapse-item" href="/recours">الطعون المثبتة</a>
             </div>
    </div>
</li>

<hr class="sidebar-divider">
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-trash"></i>
        <span>التنازلات</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div dir="rtl"  class="py-2 collapse-inner rounded">
            <a style="color : white; text-align : right;" class="collapse-item" href="/select/desistement">إضافة تنازل</a>
            <a style="color : white; text-align : right;" class="collapse-item" href="/confirm_desistements"> تثبيت التنازلات</a>
            <a style="color : white; text-align : right;" class="collapse-item" href="/desistements_not">التنازلات غير المثبتة</a>
            <a style="color : white; text-align : right;" class="collapse-item" href="/desistements">التنازلات المثبتة</a>
             </div>
    </div>
</li>

<hr class="sidebar-divider">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="/handicaps">
        <i class="fas fa-blind"></i>
        <span>أنواع الإعاقات</span></a>
</li>
<hr class="sidebar-divider">
<!-- Nav Item - Tables -->
<li class="nav-item active">
    <a class="nav-link" href="/users">
        <i class="fas fa-fw fa-users"></i>
        <span>الحسابات</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

</ul>
<!-- End of Sidebar -->
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
                            <h6 class="m-0 font-weight-bold text-primary"> الأجهزة المستعملة</h6>
                        </div>
                        <div class="row">
                            <div class="card-body col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-lg-4 text-right" for="title">التاريخ</label>
                                    <div class="col-lg-8">
                                    <input readonly value="{{$rapport->date}}" style="text-align : right" required="" type="text" class="form-control"  name="date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-4 text-right" for="title">الوقت</label>
                                    <div class="col-lg-8">
                                    <input readonly value="{{$rapport->time}}" style="text-align : right" required="" type="text" class="form-control"  name="time">
                                    
                                    </div>
                                </div>
                                <form id="devices_form" class="form-horizontal" >
                                    @csrf
                                    <input type ="hidden" value="{{$rapport->id_rapport}}" name="id_rapport" id="id_rapport" ?>
                                    
                                    <div class="form-group row">
                                        <label class="control-label col-lg-4 text-right" for="title"> الجهاز </label>
                                        <div class="col-lg-8">
                                        <select class="form-control" id="device" name="device">
                                            @foreach($devices as $device)
                                                <option value="{{$device->id_tool}}1989raouf1989{{$device->name_tool.'<br>'.$device->inventaire}}">{{$device->name_tool}} ({{$device->inventaire}})</option>
                                            @endforeach 
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-lg-4 text-right" for="title">  تكفل</label>
                                        <div class="col-lg-8">
                                        <select class="form-control" name="charge" id="charge">
                                            <option>تكفل داخلي</option>
                                            <option>تكفل خارجي</option>  
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-lg-4 text-right" for="title"> الحالة قبل الإستلام </label>
                                        <div class="col-lg-8">
                                        <select class="form-control" name="state_avant" id="state_avant" >
                                            <option>حالة جيدة</option>
                                            <option>في طور الصيانة</option>
                                            <option>عاطل</option>    
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-lg-4 text-right" for="title">رأي المستلم</label>
                                        <div class="col-lg-8">
                                        <select class="form-control" name="avis" id="avis" onchange="avis_changed(this.value,'tool','avis')">
                                            <option>بدون تحفظ</option> 
                                            <option>بتحفظ</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-lg-4 text-right" for="title"> الحالة بعد النشاط </label>
                                        <div class="col-lg-8">
                                        <select class="form-control" name="state_after" id="state_after" onchange="avis_changed(this.value,'tool','after')">
                                            <option>بدون تحفظ</option>  
                                            <option>بتحفظ</option>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="form-group" align="center">
                                    <button class="btn btn-primary" type="button" onclick="add_device()">تثبيت الجهاز</button>
                                    </div>
                                </form>
                                
                            </div>
                        
                            <div class="card-body col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="devices_table" width="100%" cellspacing="0">
                                        <thead>
                                            <tr style="background-color : lightblue">
                                                <th>الجهاز </th>
                                                <th>تكفل</th>
                                                <th>حالة قبل الإستلام</th>
                                                <th>رأي المستلم</th>
                                                <th>حالة بعد النشاط</th>
                                                <th>X</th>
                                            </tr>
                                        </thead>

                                        <tbody id="t_body_devices">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                            <hr>
                            <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"> الأدوات المستعملة</h6>
                            </div>
                            <div class="row">
                                <div class="card-body col-md-6">
                                    <form id="matieres_form" class="form-horizontal" >
                                        <div class="form-group row">
                                            <label class="control-label col-lg-4 text-right" for="title"> الأداة </label>
                                            <div class="col-lg-8">
                                            <select class="form-control" id="matiere" name="matiere">
                                                @foreach($matieres as $matiere)
                                                    <option value="{{$matiere->id_tool}}1989raouf1989{{$matiere->name_tool.'<br>'.$matiere->inventaire}}">{{$matiere->name_tool}} ({{$matiere->inventaire}})</option>
                                                @endforeach 
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-lg-4 text-right" for="title">  تكفل</label>
                                            <div class="col-lg-8">
                                            <select class="form-control" name="charge" id="charge_m">
                                                <option>تكفل داخلي</option>
                                                <option>تكفل خارجي</option>  
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-lg-4 text-right" for="title"> الحالة قبل الإستلام </label>
                                            <div class="col-lg-8">
                                            <select class="form-control" name="state_avant" id="state_avant_m" >
                                                <option>حالة جيدة</option>
                                                <option>في طور الصيانة</option>
                                                <option>عاطل</option>    
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-lg-4 text-right" for="title">رأي المستلم</label>
                                            <div class="col-lg-8">
                                            <select class="form-control" name="avis" onchange="avis_changed(this.value,'matiere','avis')" id="avis_m">
                                                <option>بدون تحفظ</option> 
                                                <option>بتحفظ</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-lg-4 text-right" for="title"> الحالة بعد النشاط </label>
                                            <div class="col-lg-8">
                                            <select class="form-control" name="state_after" id="state_after_m" onchange="avis_changed(this.value,'matiere','after')">
                                                <option>بدون تحفظ</option>  
                                                <option>بتحفظ</option>
                                            </select>
                                            </div>
                                        </div>

                                        <div class="form-group" align="center">
                                        <button class="btn btn-primary" type="button" onclick="add_matiere()">  تثبيت الأداة</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            
                                <div class="card-body col-md-6">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="matieres_table" width="100%" cellspacing="0">
                                            <thead>
                                                <tr style="background-color : lightblue">
                                                    <th>الجهاز </th>
                                                    <th>تكفل</th>
                                                    <th>حالة قبل الإستلام</th>
                                                    <th>رأي المستلم</th>
                                                    <th>حالة بعد النشاط</th>
                                                    <th>X</th>
                                                </tr>
                                            </thead>

                                            <tbody id="t_matiere_devices">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">  المواد الكيميائية</h6>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title">  قائمة المواد الكيميائية  </label>
                                    <div class="col-lg-4">
                                    <select class="form-control" name="show_chemicals" id="show_chemicals" onchange="show_chemicals(this.value)">
                                        <option> لا شيئ</option>  
                                        <option value="show">اسم المواد</option>
                                    </select>
                                    </div>
                                </div>
                                
                                <div class="row" id="chemicals_view" style="display : none">
                                    <div class="card-body col-md-6">
                                        <form id="chemicals_form" onsubmit="return add_chemical(event);">
                                            
                                            <div class="form-group row">
                                                <label class="control-label col-lg-4 text-right" for="title"> المادة </label>
                                                <div class="col-lg-8">
                                                <select class="form-control" id="chemical" onchange="load_u(this.value)" name="chemical">
                                                    @foreach($chemicals as $chemical)
                                                        <option value="{{$chemical->id_chemical}}1989raouf1989{{$chemical->name_chemical}}1989raouf1989{{$chemical->unity}}">{{$chemical->name_chemical}}</option>
                                                    @endforeach 
                                                </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-lg-4 text-right" for="title">  الوحدة</label>
                                                <div class="col-lg-8">
                                                    @if(isset($chemicals[0]->unity))
                                                    <input type="text" value="{{$chemicals[0]->unity}}" required id="unity" class="form-control">
                                                    @else
                                                    <input type="text" value="" required id="unity" class="form-control">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-lg-4 text-right" for="title">   الكمية </label>
                                                <div class="col-lg-8">
                                                    <input type="number" value="" required id="quantity" class="form-control">
                                                </div>
                                            </div>


                                            <div class="form-group" align="center">
                                                <button class="btn btn-primary" type="submit" >تثبيت المادة</button>
                                            </div>
                                        </form>
                                        
                                    </div>
                                
                                    <div class="card-body col-md-6">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="chemicals_table" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr style="background-color : lightblue">
                                                        <th>المادة </th>
                                                        <th>الوحدة</th>
                                                        <th>الكمية</th>
                                                        <th>X</th>
                                                    </tr>
                                                </thead>

                                                <tbody id="t_body_chemicals">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                            </div>
                            <br><br>
                            
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <div align="center">
                <button onclick="submit_form()" class="btn btn-primary">طباعة التقرير اليومي </button>
            </div>

<input type="hidden" id="id_rapport" value="{{$rapport->id_rapport}}">
@include('components.footer')

<script type="text/javascript">

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function add_matiere(){
    matiere = document.getElementById('matiere');
    matieres = matiere.value.split('1989raouf1989')[1];
    id =Math.random();
    ze_id = matiere.value.split('1989raouf1989')[0];
    charge = document.getElementById('charge_m');
    state_avant = document.getElementById('state_avant_m');
    avis = document.getElementById('avis_m');
    state_after = document.getElementById('state_after_m');
    str = document.getElementById('t_matiere_devices').innerHTML;
    str +="<tr id='matiere_"+id+"'>"+
        "<td style='display : none'>"+ze_id+"</td>"+    
        "<td style='display : none'>أداة</td>"+   
        "<th>"+matieres+"</th>"+
        "<td>"+charge.value+"</td>"+
        "<td>"+state_avant.value+"</td>"+
        "<td>"+avis.value+"</td>"+
        "<td>"+state_after.value+"</td>"+
        "<th><button class='btn btn-danger' onclick=\"enlever('matiere_"+id+"')\">X</button></th>"+
    "</tr>";
    document.getElementById('t_matiere_devices').innerHTML = str;
    document.getElementById('matieres_form').reset();
}
function add_device(){
    device = document.getElementById('device');
    devices = device.value.split('1989raouf1989')[1];
    id =Math.random();
    ze_id = device.value.split('1989raouf1989')[0];
    charge = document.getElementById('charge');
    state_avant = document.getElementById('state_avant');
    avis = document.getElementById('avis');
    state_after = document.getElementById('state_after');
    str = document.getElementById('t_body_devices').innerHTML;
    str +="<tr id='device_"+id+"'>"+
        "<td style='display : none'>"+ze_id+"</td>"+    
        "<td style='display : none'>جهاز</td>"+   
        "<th>"+devices+"</th>"+
        "<td>"+charge.value+"</td>"+
        "<td>"+state_avant.value+"</td>"+
        "<td>"+avis.value+"</td>"+
        "<td>"+state_after.value+"</td>"+
        "<th><button class='btn btn-danger' onclick=\"enlever('device_"+id+"')\">X</button></th>"+
        
    "</tr>";
    document.getElementById('t_body_devices').innerHTML = str;
    document.getElementById('devices_form').reset();

}
function add_chemical(e){
    e.preventDefault();
    console.log(e);
    chemical = document.getElementById('chemical');
    chemicals = chemical.value.split('1989raouf1989')[1];
    id =Math.random();
    ze_id = chemical.value.split('1989raouf1989')[0];
    unity = document.getElementById('unity');
    quantity = document.getElementById('quantity');
    str = document.getElementById('t_body_chemicals').innerHTML;
    str +="<tr id='chemical_"+id+"'>"+
        "<td style='display : none'>"+ze_id+"</td>"+    
        "<th>"+chemicals+"</th>"+
        "<th>"+unity.value+"</th>"+
        "<td>"+quantity.value+"</td>"+
        "<th><button class='btn btn-danger' onclick=\"enlever('chemical_"+id+"')\">X</button></th>"+
    "</tr>";
    document.getElementById('t_body_chemicals').innerHTML = str;
    document.getElementById('chemicals_form').reset();
    return false;

}
function enlever(id){
    document.getElementById(id).remove();
}
function changed_activity(val){
    if(val =="all"){
        document.getElementById('some').style.display ='none';
    }else{
        document.getElementById('some').style.display ='flex';
    } 
}

function show_chemicals(val){
    if(val =="show"){
        document.getElementById('chemicals_view').style.display ='flex';
    }else{
        document.getElementById('chemicals_view').style.display ='none';
    } 
}

function submit_form(){
    
    insert_outils("devices","/insert_outils","");
    insert_outils("matieres","/insert_outils","");
    show = document.getElementById('show_chemicals').value;
    if(show =="show"){
        insert_outils("chemicals","/insert_chemicals","redirect");
    }

}

function insert_outils(table,link,success){
    const id_rapport = document.getElementById('id_rapport').value;
    const trs = document.querySelectorAll('#'+table+'_table tr');
    //console.log(trs);
    const result = [];

    for(let tr of trs) {
    let th_td = tr.getElementsByTagName('td');
    if (th_td.length == 0) {
        th_td = tr.getElementsByTagName('th');
    }
    
    let th_td_array = Array.from(th_td); // convert HTMLCollection to an Array
    th_td_array = th_td_array.map(tag => tag.innerText); // get the text of each element
    th_td_array.push(id_rapport);
    result.push(th_td_array);
    }
    result.shift();

    $.ajax({
        url: link,
        method: "POST", // First change type to method here    
        data: {devices : result},
        success: function(response) {
            console.log(response);
            if(success =="redirect"){
                window.location.href = "/rapports";
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}
function load_u(){
    chemical = document.getElementById('chemical');
    u = chemical.value.split('1989raouf1989')[2];
    document.getElementById('unity').value = u;;
}
function avis_changed(val,type,state){
    rapport = document.getElementById('id_rapport').value;
    if(type=="tool"){
        devices = document.getElementById('device').value;
    }else{
        devices = document.getElementById('matiere').value;
    }
    
    device = devices.split('1989raouf1989')[0];
    if(val =="بتحفظ"){
        add_reserve(rapport,device,state);
    }
}
function add_reserve(rapport,outil,state){
  var myWindow = popupwindow("/add_reserve/"+rapport+"/"+outil+"/"+state, " التحفظ", "3080","2720");
}
function popupwindow(url, title, w, h) {
  var left = (screen.width/2)-(w/2);
  var top = (screen.height/2)-(h/2);
  return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
} 
window.onload = function(){
	document.getElementById('loading').style.display = "none";
};

</script>
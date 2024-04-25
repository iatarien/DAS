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
                            <h6 class="m-0 font-weight-bold text-primary">تثبيت </h6>
                        </div>
                        <div class="card-body">
                            <form autocomplete="off" id="form" class="form-horizontal" action="/confirm_patient" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$patient->id_patient}}" name="patient">
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title">اللقب</label>
                                    <div class="col-lg-8">
                                        <input style="text-align : right" required="" type="text" class="form-control" value="{{$patient->nom}}"  name="nom">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title">الاسم</label>
                                    <div class="col-lg-8">
                                        <input style="text-align : right" required="" type="text" class="form-control" value="{{$patient->prenom}}" name="prenom">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title">اللقب باللاتينية</label>
                                    <div class="col-lg-8">
                                        <input style="text-align : right" dir="ltr" required="" type="text" class="form-control" value="{{$patient->nom_fr}}" name="nom_fr">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title">الاسم باللاتينية</label>
                                    <div class="col-lg-8">
                                        <input style="text-align : right" dir="ltr" required="" type="text" class="form-control" value="{{$patient->prenom_fr}}"  name="prenom_fr">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title">الجنس</label>
                                    <div class="col-lg-8">
                                        <select required="" class="form-control"  name="sexe">
                                            <option selected style="visibility : hidden;" value="{{$patient->sexe}}">{{$patient->sexe}}</option>
                                            <option >ذكر</option>
                                            <option >أنثى</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title">اسم الأب</label>
                                    <div class="col-lg-8">
                                        <input style="text-align : right" required="" type="text" class="form-control" value="{{$patient->father}}"  name="father">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title">لقب و اسم الأم</label>
                                    <div class="col-lg-8">
                                        <input style="text-align : right" required="" type="text" class="form-control" value="{{$patient->mother}}"  name="mother">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title">تاريخ الإزدياد</label>
                                    <div class="col-lg-8">
                                    <input  style="text-align : right" required="" type="date" class="form-control" value="{{$patient->date_naissance}}" name="date_naissance">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title">مكان الإزدياد</label>
                                    <div class="col-lg-8">
                                        <input style="text-align : right" required="" type="text" class="form-control" value="{{$patient->lieu_naissance}}" name="lieu_naissance">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title">البلدية</label>
                                    <div class="col-lg-8">
                                        <select required="" class="form-control"  name="commune">
                                            <option selected style="visibility : hidden;" value="{{$patient->code}}">
                                                {{$patient->code}} - {{$patient->commune_name}}
                                            </option>
                                            @foreach($communes as $commune)
                                            <option value="{{$commune->code}}">{{$commune->code}} - {{$commune->commune_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title"> العنوان</label>
                                    <div class="col-lg-8">
                                        <input style="text-align : right" required="" type="text" class="form-control" value="{{$patient->adresse}}" name="adresse">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title"> طبيعة الإعاقة</label>
                                    <div class="col-lg-8">
                                        <select required="" class="form-control" onchange="threshold()" id="handicap" name="handicap">
                                            <option selected style="visibility : hidden;" value="{{$patient->handicap}}">{{$patient->name_handicap}}</option>
                                            @foreach($handicaps as $handicap)
                                                <option value="{{$handicap->id_handicap}}">{{$handicap->name_handicap}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title"> نسبة الإعاقة</label>
                                    <div class="col-lg-8">
                                        <input style="text-align : right" dir="ltr" id="taux" onchange="threshold()" onkeyup="threshold()" required="" value="{{$patient->taux}}" type="number" class="form-control"  name="taux">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title"> رقم البطاقة</label>
                                    <div class="col-lg-8">
                                        <input style="text-align : right" required="" dir="ltr" type="number" class="form-control"  value="{{$patient->num_card}}" name="num_card">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title">تاريخ :</label>
                                    <div class="col-lg-8">
                                    <input  style="text-align : right" required="" type="date" class="form-control" value="{{$patient->date_card}}" name="date_card">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-2 text-right" for="title">الملف الطبي :</label>
                                    <div class="col-lg-8">
                                        <input  type="file"  max-size="10240" name="medical_file" id="medical_file" accept="application/pdf" class="form-control" >
                                    </div>
                                    @if($patient->medical_file != NULL && $patient->medical_file != "")
                                    <div class="col-lg-1">
                                        <a class="btn btn-info" target="_blank"  href="{{$patient->medical_file}}">معاينة</a>
                                    </div>
                                    @endif
                                </div>
                                <br><br>
                                <input type="hidden" name="accepted" id="accepted" value="accept">
                                <div class="form-group" align="center">
                                    <button id="reject_btn" class="btn btn-danger" type="button" onclick="reject_patient()">رفض</button>
                                    <button id="accept_btn" class="btn btn-primary" type="submit">حفظ</button>
                                </div>
                            </from>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @include('components.footer')
<script src="{{ url('js/sweetalert2.min.js') }}"></script>           
<script type="text/javascript">
threshold();
function threshold(){
    var handicap_v = document.getElementById('handicap').value;
    var taux = document.getElementById('taux').value;
    var handicaps = '{{json_encode($handicaps)}}';
    handicaps = handicaps.split("&quot;").join('"');
    handicaps = JSON.parse(handicaps);
    
    let handicap = handicaps.find(x => x.id_handicap == handicap_v);
    if(handicap.threshold > taux){
        reject();
    }else{
        accept();
    }

}
function reject(){
    document.getElementById('taux').style.backgroundColor ="pink";
    document.getElementById('accept_btn').disabled = true;
}
function accept(){
    document.getElementById('taux').style.backgroundColor ="transparent";
    document.getElementById('accept_btn').disabled = false;
}
function reject_patient(){
    document.getElementById('accepted').value="reject";
    document.getElementById('form').submit();
}
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
<script>
$(function(){
    $('form').submit(function(){
        var isOk = true;
        $('input[type=file][max-size]').each(function(){
            if(typeof this.files[0] !== 'undefined'){
                var maxSize = parseInt($(this).attr('max-size'),10)*1000,
                size = this.files[0].size;
                isOk = maxSize > size;
                if(!isOk){
                    Swal.fire({
                    title: "La taille des fichiers est trop volumineuse !",
                    text: "(La taille de chaque fichier ne doit pas dépasser 10 Mo)",
                    icon: "error",
                    confirmButtonText : "Rééssayer",
                    });
                }
                return isOk;
            }
        });
        return isOk;
    });
});
</script>
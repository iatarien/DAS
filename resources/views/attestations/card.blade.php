<!DOCTYPE html>
<html>
<head>
	  <!-- Bootstrap CSS -->
	  <link href="{{ url('css/bootstrap.min.css')}}" rel="stylesheet">
	  <!-- bootstrap theme -->
	<title></title>
<style type="text/css">
	@page {
	    size: auto;   /* auto is the initial value */
		size: portrait;
	    margin: 0;  /* this affects the margin in the printer settings */
	}
	@media print {
		html,body{
			height:100mm;
	    	width:150mm;
			overflow-y : hidden !important;
		}
		
	}
	html,body {
	    height:106mm;
	    width:150mm;
	    margin: auto;
        /* overflow-y : hidden; */
	    line-height: 1.6;
	    -webkit-print-color-adjust: exact !important;
	}
    span {
        text-align: right;
    }
	.show {
		color : black !important;
		width : 60%;
		text-align : center;
	}
	.show_small {
		color : black !important;
		width : 80%;
		text-align : center;
	}
	.show_big {
		color : black !important;
		width : 55%;
		text-align : center;
	}
</style>

</head>
<body contenteditable="false">
<?php
$type_ar ="";
?>
<section  style="background-color: lightblue; margin-top : 6mm; font-weight : bold; font-size: 3.8mm;" id="fiche" dir="rtl">
	<div id="fiche_top" style="display: flex; justify-content: center; border : 1px solid; height : 99.6mm;">
        <div style="width : 50%; border : 1px solid; padding-right : 5mm; padding-left : 8mm;" >
            <div id="id-handicap" style="display : flex; justify-content: center; margin-top : {{$paddings->handicap}}mm; align-items : center"><span >طبيعة الإعاقة : </span>
			<span class="show">{{$patient->name_handicap}}</span></div>
			<div  style="display : flex; justify-content: center; align-items : center"><span >نسبة الإعاقة : </span>
			<span class="show">% {{$patient->taux}}</span></div>
			<div id="id-benefit" style="display : flex; justify-content: center; align-items : center; color : black !important;
			margin-top : {{$paddings->benefit}}mm;"><span > تاريخ الاستفادة : </span>
			<span style="width : 55%; text-align : center;">{{$patient->date_card}}</span></div>
            <div style="margin-top : {{$paddings->wilaya}}mm;" id="id-wilaya" >
				<span>
					سلمت هذه البطاقة من طرف مدير {{$direction}} لولاية <span class="show">&emsp;&emsp;{{$ville}}</span>
				</span>
			</div>
            <br><br>
            <span style="text-align : center; width : 100%; display : block;">
               في : <span class="show">&emsp;&emsp;</span>
            </span>
            <br>
            <span style="text-align : center; width : 100%; display : block;">
               إمضاء
            </span>
        </div>
        <div style="width : 50%; border : 1px solid; padding-right : 3mm; padding-left : 8mm; padding-top : 2mm;" >
            	<div style="display : inline">
					<div style="height : 20mm; width : 22mm; border : 0.54mm solid; display : inline-block;"></div>
					<div contenteditable="true" dir="rtl" class="show" id="again" style="height : 20mm; width : 22mm; display : none; position : absolute; margin-right : 50px;">
						<br> نسخة ثانية
					</div>
				</div>
				
            	<div id="id-names"  style="display : flex; margin-top : {{$paddings->names}}mm; justify-content: center; align-items : center"><span > اللقب : </span>
				<span class="show_small">{{$patient->nom}}</span> </div>
                <div  style="display : flex; justify-content: center; align-items : center">الاسم : </span>
				<span class="show_small">{{$patient->prenom}}</span></div>
                <div id="id-date_N"   style="display : flex; justify-content: center; margin-top : {{$paddings->date_N}}mm; align-items : center"> <span> تاريخ و مكان الميلاد : </span>
					<span class="show_big" style="width : 50%;" contenteditable ="true" dir="ltr" id="presume">{{$patient->date_naissance}}</span>
				</div>
				<div id="id-lieu_N" style="text-align : center; margin-top : {{$paddings->lieu_N}}mm; "><span class="show"> بــ : {{$patient->lieu_naissance}}</span><br></div>

				<div id="id-adresse" style="text-align : center; margin-top : {{$paddings->adresse}}mm; ">
				العنوان : ..................................</span><br>
					<span class="show">{{$patient->adresse}}</span><br>
				</div>
				<div id="id-names_fr" style="text-align : center;  margin-top : {{$paddings->names_fr}}mm; ">
					اللقب و الاسم باللغة اللاتينية : <br>
					<span class="show">{{$patient->nom_fr}} {{$patient->prenom_fr}}</span>
				</div>
				إمضاء المعني : 
				<span id="id-num" style="color : black !important; text-align : center; width : 100%; display : block; margin-top : {{$paddings->num}}mm;">
				01/01/04 /{{$patient->acronym}}/ {{$patient->num_card}} 
				</span>
		</span>
        </div>

	</div>
</section>
<input type="hidden" id="real_date_N" value="{{$patient->date_naissance}}"/>
<br>
<div class="form-group" dir="rtl">
<label>    خلال : </label>
<input type="checkbox"  
onclick="presume(this.id,this.checked)" id="presume_checkbox"
style="width : 5%; text-align : center;" />
</div>
<br>
<div class="form-group" dir="rtl">
<label> طبيعة و نسبة الإعاقة : </label>
<input type="number" value ="{{$paddings->handicap}}" onkeyup="changed(this.id, this.value)"
onchange="changed(this.id, this.value)" id="handicap"
style="width : 40%; margin-left : 10%; text-align : center;" />
</div><br>
<div class="form-group" dir="rtl">
<label> تاريخ الاستفادة : </label>
<input type="number" value ="{{$paddings->benefit}}" onkeyup="changed(this.id, this.value)"
onchange="changed(this.id, this.value)" id="benefit"
style="width : 40%; text-align : center;" />
</div><br>
<div class="form-group" dir="rtl">
<label> مدير النشاط الاجتماعي والتضامن لولاية : </label>
<input type="number" value ="{{$paddings->wilaya}}" onkeyup="changed(this.id, this.value)"
onchange="changed(this.id, this.value)" id="wilaya"
style="width : 40%; text-align : center;" />
</div><br>
<div class="form-group" dir="rtl">
<label>  اللقب و الإسم: </label>
<input type="number" value ="{{$paddings->names}}" onkeyup="changed(this.id, this.value)"
onchange="changed(this.id, this.value)" id="names"
style="width : 40%; text-align : center;" />
</div><br>
<div class="form-group" dir="rtl">
<label> تاريخ الميلاد : </label>
<input type="number" value ="{{$paddings->date_N}}" onkeyup="changed(this.id, this.value)"
onchange="changed(this.id, this.value)" id="date_N"
style="width : 40%; text-align : center;" />
</div><br>
<div class="form-group" dir="rtl">
<label>  مكان الميلاد : </label>
<input type="number" value ="{{$paddings->lieu_N}}" onkeyup="changed(this.id, this.value)"
onchange="changed(this.id, this.value)" id="lieu_N"
style="width : 40%; text-align : center;" />
</div><br>
<div class="form-group" dir="rtl">
<label> العنوان : </label>
<input type="number" value ="{{$paddings->adresse}}" onkeyup="changed(this.id, this.value)"
onchange="changed(this.id, this.value)" id="adresse"
style="width : 40%; text-align : center;" />
</div><br>
<div class="form-group" dir="rtl">
<label> اللقب و الاسم باللغة اللاتينية : </label>
<input type="number" value ="{{$paddings->names_fr}}" onkeyup="changed(this.id, this.value)"
onchange="changed(this.id, this.value)" id="names_fr"
style="width : 40%; text-align : center;" />
</div><br>
<div class="form-group" dir="rtl">
<label>  رقم البطاقة : </label>
<input type="number" value ="{{$paddings->num}}" onkeyup="changed(this.id, this.value)"
onchange="changed(this.id, this.value)" id="num"
style="width : 40%; text-align : center;" />
</div><br>
<div class="form-group" dir="rtl">
<label>   نسخة ثانية : </label>
<input type="checkbox"  
onclick="la_again(this.id)" id="le_checkbox"
style="width : 5%; text-align : center;" />
</div><br>

<br><br>
<div align="center">
	<button id="bouton" style="
	  background-color: lightgray; /* Green */
	  border: none;
	  color: black;
	  cursor: pointer;
	  padding: 15px 32px;
	  text-align: center;
	  text-decoration: none;
	  display: inline-block;
	  font-size: 16px;" 
  onclick="printdiv('fiche')"> طباعة </button>
  
  <button id="bouton_2" style="
	  background-color: lightblue; /* Green */
	  border: none;
	  color: black;
	  cursor: pointer;
	  padding: 15px 32px;
	  text-align: center;
	  text-decoration: none;
	  display: inline-block;
	  font-size: 16px;" 
  onclick=location.href="/fiche/"+"{{$patient->id_patient}}"+"/card2/"> الخلف </button>

<button id="bouton_2" style="
	  background-color: skyblue; /* Green */
	  border: none;
	  color: black;
	  cursor: pointer;
	  padding: 15px 32px;
	  text-align: center;
	  text-decoration: none;
	  display: inline-block;
	  font-size: 16px;" 
  onclick=location.href="/validated_patients/"> رجوع </button>


 <br><br><br><br>
</div>
<script src="{{ url('js/jquery.js') }}"></script>
<script src="{{ url('js/jquery-ui-1.10.4.min.js') }}"></script>
<script src="{{ url('js/jquery-1.8.3.min.js') }}"></script>
<script src="{{ url('js/tagfeet.js') }}" ></script>
<script type="text/javascript">
window.onbeforeunload = function () {
    window.close();
};
function la_again(id) {
	value = document.getElementById("le_checkbox").checked;
	console.log(value);
	if(value){
		document.getElementById('again').style.display = "inline-block";
	}else{
		document.getElementById('again').style.display = "none";
	}
	
}
function presume(id,checked) {
	if(checked){
		str = document.getElementById("presume").innerHTML;
		const indexs = [5,6,8,9];

		indexs.forEach(function(index, i) {
			str = str.slice(0, index) +"X"+ str.slice(index + 1);
		});
		document.getElementById("presume").innerHTML = str;
	}else{
		document.getElementById("presume").innerHTML = document.getElementById("real_date_N").value;
	}
	
}

function changed(id,value){
	document.getElementById('id-'+id).style.marginTop =  value+"mm";
	link = "/paddings/"+id+"/"+value;
    $.ajax({
        url: link,
        method: "GET",  
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function hide(){
	fiche = document.getElementById('fiche');
	fiche.style.color = "transparent";
	fiche.style.backgroundColor = "transparent";

}
function unhide(){
	fiche = document.getElementById('fiche');
	fiche.style.color = "black";
	fiche.style.backgroundColor = "lightblue";


}

function printdiv(printdivname) {
	document.getElementById('bouton').style.display = "none";
	document.getElementById('bouton_2').style.display = "none";
	
	hide();
    print();
	unhide();

    document.getElementById('bouton').style.display = "inline-block";
	document.getElementById('bouton_2').style.display = "inline-block";
	
    return false;
}
jQuery(document).bind(" keydown", function(e){
    if(e.ctrlKey && e.keyCode == 80){
		printdiv('fiche');
		return false;
    }
	
});
</script>
</body>
</html>



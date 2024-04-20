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
			height:106mm;
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
	}
</style>

</head>
<body contenteditable="false">
<?php
$type_ar ="";
?>
<section  style="background-color: lightblue; margin-top : 6mm; font-weight : bold; " id="fiche" dir="rtl">
	<div id="fiche_top" style="display: flex; justify-content: center; border : 1px solid; height : 99.6mm;">
        <div style="width : 50%; border : 1px solid; padding-right : 5mm; padding-left : 8mm; padding-top : 3mm; text-align : justify; " >
            <span >تسهل هذه البطاقة الوصول إلى المزايا&emsp; المنصوص عليها في القانون رقم 02-09 
				 المؤرخ في 25 صفر &emsp;عام 1423 الموافق 8 مايو 2002 و المتعلق بحماية الأشخاص المعوقين و ترقيتهم.
            </span>
            <br><br><br><br>
            <div style="font-size : 12mm; rotate : -45deg; text-align : center;">
              الأولوية
			</div>

        </div>
        <div style="width : 50%; border : 1px solid; padding-right : 3mm; padding-left : 8mm; padding-top : 2mm; font-size: 3.8mm; text-align : center;" >
            <span> الجمهورية الجزائرية الديمقراطية الشعبية</span>
			<hr style="border-color : black; width : 28mm; margin-top : 0;"><br>
			<span>وزارة {{$ministere}}</span>
			<hr style="border-color : black; width : 28mm; margin-top : 0;"><br><br><br>
			<div style="font-size : 8mm; text-align : center;">
              بطاقة الشخص المعوق
			</div><br><br><br>
			<div style="display : flex; justify-content: center; align-items : center">
			الرقم :&emsp; <div style="height : 11mm; width : 24mm; border : 0.54mm solid;display : flex; justify-content: center; align-items : center">
			<span class="show">{{$patient->num_card}}</span></div>
			<div style="height : 11mm; width : 24mm; border : 0.54mm solid; border-right : none; display : flex; justify-content: center; align-items : center">
			<span class="show">{{$patient->year}}</span></div>
			</div>
        </div>

	</div>
</section>

<br><br><br><br>
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
  onclick=location.href="/fiche/"+"{{$patient->id_patient}}"+"/card/"> الأمام </button>

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
  onclick=location.href="/patients/"> رجوع </button>


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

function hide(){
	fiche = document.getElementById('fiche');
	fiche.style.color = "transparent";
	fiche.style.backgroundColor = "transparent";

	var elements = document.getElementsByTagName("hr");

    for(var i = elements.length - 1; i >= 0; --i)
    {
        elements[i].style.borderColor ="transparent";
    }
}
function unhide(){
	fiche = document.getElementById('fiche');
	fiche.style.color = "black";
	fiche.style.backgroundColor = "lightblue";

	var elements = document.getElementsByTagName("hr");

    for(var i = elements.length - 1; i >= 0; --i)
    {
        elements[i].style.borderColor ="black";
    }
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



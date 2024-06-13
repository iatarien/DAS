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
			height:297mm;
	    	width:210mm;
			overflow-y : hidden !important;
		}
		
	}
	html,body{
	    height:287mm;
	    width:210mm;
	    margin: auto;
	    line-height: 1.6;
	    -webkit-print-color-adjust: exact !important;
	}


</style>

</head>
<body contenteditable="false">
<?php
if($type =="fiche_info"){
	$type_ar = "بطاقة معلومات";
}elseif($type=="att_info"){
	$type_ar = "شهادة معلومات";
}elseif($type=="att_admin"){
	$type_ar = "شهادة إدارية";
}
?>
<section  style="background-color: white; text-align: center; font-size: 13.5px; margin: 20px;" id="fiche">
	<div id="fiche_top">
        <div style="  display: inline-block;">
			<h2 style="text-decoration: underline; padding: 0px 5px 0px 5px;">    الجمهورية الجزائرية الديمقراطية الشعبية    </h2>
		</div>
		<br>
		<div style="  display: inline-block; float: right; ">
            <h2 style="text-align : right;">
            <br> ولايـــة {{$ville}}
			<br>مـــديـــريـــة  {{$direction}}
            <br> الرقم : ........... /م.ن.ا.ت/{{$the_year}}
            

		</div>
        <div style="text-align : left;font-weight : lighter; margin-left : 10%;" dir="rtl">
        <br><br><br>
		    <h2>{{$ville}} في : ..................... </h2>
        </div>
        <br><br><br><br>
		<div align="center" dir="rtl">
			<h1 style=" font-size : 10mm; margin : 0; width : 40%; border : 1px solid black; text-underline-offset: 10px;"> 
            {{$type_ar}}
            </h1>
            <br>
            <p style="font-size : 5.5mm; text-align : justify;">نحن مدير {{$direction}} لولاية {{$ville}} : <br><br>
            أشهد بأن السيد(ة) : <strong>{{$patient->nom}} {{$patient->prenom}}</strong><br>
			<?php $dn = new DateTime($patient->date_naissance); ?>
            المولود(ة) بتاريخ : <strong>{{ $dn->format('d-m-Y')}}</strong>&emsp;&emsp; بــ : <strong>{{$patient->lieu_naissance}}</strong><br>
            ابن : <strong>{{$patient->father}}</strong>&emsp;&emsp; و : <strong>{{$patient->mother}}</strong><br>
            الساكن(ة) بـ : <strong>{{$patient->adresse}}</strong><br>
            من فئة المعاقين : <strong>{{$patient->name_handicap}}</strong>&emsp;&emsp;<strong>%{{$patient->taux}}</strong><br><br>
			<?php $d = new DateTime($patient->date_card); ?>
            الحامل(ة) لبطاقة معوق رقم : <strong>{{$patient->num_card}}</strong>&emsp;&emsp; تاريخ الإستفادة : <strong>{{ $d->format('d-m-Y')}}</strong><br> 
            </p>
            <span style="font-size : 5.5mm; text-align : center;">سلمت هذه الوثيقة بناءا على طلب المعني(ة) بالأمر للإدلاء بها فيما يسمح به القانون.</span>
		</div>
        <div style="text-align : left;font-weight : lighter; margin-left : 10%;font-size : 5.5mm;" dir="rtl">
        <br>
		    <h2>المديــر </h2>
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



function convert(num){
	num = ""+ num;
	var num1 = num;
	var num2 = null
	if(num.includes('.')){
		num1 = parseInt(num.split(".")[0]);
		num2 = parseInt(num.split(".")[1]);
	}
	if(num2 != null && num.split(".")[1].length == 1 ){
		num2 = num2 *10;
	}
	var txt = nArabicWords(num1);
	txt = txt.replace('ومليون', "و واحد مليون")
	txt+= " "+"دينار";
	if(num2 != null){
		txt +=" "+"و"+" "+nArabicWords(num2)+" "+"سنتيم";
	}
	document.getElementById('montant').innerHTML = txt;
}
function PrintElem(elem)
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('</head><body >');
    mywindow.document.write('<h1>' + document.title  + '</h1>');
    mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.print();


    return true;
}
function printdiv(printdivname) {
	document.getElementById('bouton').style.display = "none";
	document.getElementById('bouton_2').style.display = "none";
   /* var footstr = "</body>";
    var newstr = document.getElementById(printdivname).innerHTML;
    var oldstr = document.body.innerHTML;
    document.body.innerHTML = ""+newstr+footstr;
    window.print();
    document.body.innerHTML = oldstr;*/
    print();
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



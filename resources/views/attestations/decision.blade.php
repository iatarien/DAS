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
<?php $dn = new DateTime($patient->date_naissance); ?>
<?php $d = new DateTime($patient->date_card); ?>
<section  style="background-color: white; text-align: center; font-size: 12px; margin: 60px; margin-top : 20px;" id="fiche">
	<div id="fiche_top">
        <div style="  display: inline-block;">
			<h2 style=" padding: 0px 5px 0px 5px;">   * الجمهورية الجزائرية الديمقراطية الشعبية *   </h2>
		</div>
		<br>
		<div style="  display: inline-block; float: right; ">
            <h2 style="text-align : right;">
            <br> ولايـــة {{$ville}}
			<br>مـــديـــريـــة  {{$direction}}
            <br> مصلحة حماية الأشخاص المعوقين و ترقيتهم
            

		</div>
        <div style="text-align : center; foat : left; font-weight : lighter; margin-left : 2%;" dir="rtl">
        <br><br>
		    <h2>مقرر رقم : ............. بتاريخ : ...................<br>
            المتضمن استفادة السيد(ة) : {{$patient->nom}} {{$patient->prenom}} <br>
            من بطاقة الإعاقة
            </h2>
        </div>
		<div align="center" dir="rtl">
            <p contenteditable="true" style="font-size : 4.6mm; text-align : justify;">
            <strong> ان مدير {{$direction}} لولاية {{$ville}} : </strong><br>
            - بمقتضى القانون رقم 12/07 المؤرخ في 2012/02/21 المتضمن قانون الولاية .<br>
            - بمقتضى القانون 09/02 المؤرخ في 2002/05/08 و المتعلق بحماية الأشخاص المعاقين و ترقيتهم لا سيما المادة 05 منه .<br>
            -  بمقتضى المرسوم التنفيذي رقم 10/128 مؤرخ في 13 جمادى الأولى عام 1431 الموافق ل 28 أبريل سنة 2010 يتضمن تعديل تنظيم مديرية النشاط الإجتماعي للولاية .<br>
            - بمقتضى المرسوم التنفيذي رقم 175/03 المؤرخ في 2003/04/14 الموافق ل 12 صفر عام 1424 المتعلق باللجنة الطبية الولائية المتخصصة و اللجنة الوطنية للطعن .<br>
            -  بمقتضى محضر اللجنة الطبية الولائية المتخصصة المؤرخ في  {{ $d->format('d-m-Y')}} .<br>
            </p>
            <h2> باقتراح من السيد رئيس مصلحة حماية الأشخاص المعوقين و ترقيتهم </h2>
            <h2> * يـــقرر * </h2>
            <p contenteditable="true" style="font-size : 4.7mm; text-align : justify;">
            <strong style="text-decoration : underline">المادة الأولى </strong> : يستفيد من بطاقة الإعاقة السيد(ة) : <strong>{{$patient->nom}} {{$patient->prenom}} </strong><br>
            @if($patient->presume != NULL && $patient->presume != 0)
				المولود(ة)  : <strong id="la_dn"><span style="color : transparent;">Y</span>{{ $dn->format('Y')}}-XX-XX</strong>&emsp;&emsp; 
			@else
				المولود(ة)  : <strong id="la_dn">{{ $dn->format('d-m-Y')}}</strong>&emsp;&emsp; 
			@endif
            بــــ : <strong> {{$patient->lieu_naissance}} </strong><br>
			
            (ة)ابن : <strong>{{$patient->father}}</strong>&emsp;&emsp; (ة)و ابن : <strong>{{$patient->mother}}</strong><br>
            نوع الإعاقة : <strong>{{$patient->name_handicap}}</strong>&emsp;&emsp; بلدية اللإقامة : <strong>{{$commune}}</strong><br>
            نسبة الإعاقة :<strong>%{{$patient->taux}}</strong><br>  
            تاريخ الإستفادة : <strong>{{ $d->format('d-m-Y')}}</strong><br> <br>
            <strong style="text-decoration : underline">المادة 02 </strong> : يكلف كل من السادة رئيس مصلحة حماية الأشخاص المعوقين و ترقيتهم و رئيس مصلحة الإدارة العامة و الوسائل
            بالمديرية كل فيما يخصه تنفيذ هذا المقرر.<br>
            </p>
		</div>
        <div style="text-align : left;font-weight : lighter; margin-left : 2%;font-size : 5.5mm;" dir="rtl">
        <br>
            <span>{{$ville}} في : ....................... <br>
		    <h4>مدير {{$direction}} </h4>
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


@if($patient->presume != NULL && $patient->presume != 0)
// var dateElement = document.getElementById("la_dn");
// dateElement.innerText = dateElement.innerText.replaceAll("_","-");
// dateElement.innerText = dateElement.innerText.replaceAll("YY"," ");
// var dateText = dateElement.innerText;
// var parts = dateText.split("-");
// console.log(parts);
// dateElement.innerText = `${parts[2]}-${parts[0]}-${parts[1]}`;
@endif
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



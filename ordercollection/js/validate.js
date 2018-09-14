	var species		= new Array();
	var sampleType	= new Array();
	var animalAge	= new Array();
	var animalSex	= new Array();
	var testsRequired	= new Array();
	var diseaseSuspected= new Array();
	var animalHistory	= new Array();
	var lab				= new Array();
	var barcode			= new Array();
	
$(document).ready(function(){
    $("#submit_orders").click(function(){
		load_specimenSample();
		//lab=getLabs('labs');
        $.post("process_order_entry.php",
			{
				application_date	: $("#application_date").val(),
				sample_received_date: $("#sample_received_date").val() ,
				reference_number	: $("#reference_number").val(),
				receipt_number		: $("#receipt_number").val(),
				owner_name			: $("#owner_name").val(),
				owner_number		: $("#owner_number").val(),
				doctor_name			: $("#doctor_name").val(),
				doctor_number		: $("#doctor_number").val(),
				sample_place		: $("#sample_place").val(),
				sample_state		: $("#sample_state option:selected").text(),
				doctor_email_id		: $("#doctor_email").val(),
				owner_email_id		: $("#owner_email").val(),
				owner_address		: $("#owner_address").val(),
				doctor_address		: $("#doctor_address").val(),
				barcode				: barcode,
				species				: species,
				sampleType			: sampleType,
				animalAge			: animalAge,
				animalSex			: animalSex,
				animalHistory		: animalHistory,
				testsRequired		: testsRequired,
				diseaseSuspect		: diseaseSuspected,
				lab					: lab
			},
			function(data, status){
				if(status){
					
					bootbox.alert("Orders Sent to respective labs Successfully !!!",function(){window.location.reload();});
					window.opener.location.reload(true);
					window.self.close();
				}
				else
					bootbox.alert("Failed to send orders to respective labs !!!");
			});
	});
});

function getLabs(checkboxName) {
    var checkboxes = document.querySelectorAll('input[name="' + checkboxName + '"]:checked'), values = [];
    Array.prototype.forEach.call(checkboxes, function(el) {
        values.push(el.value);
    });
    return values;
}

function load_specimenSample(){
	var sampleNames = ['specimenSpecies[]','sampleType[]','animalAge[]','animalSex[]','animalHistory[]','testsRequired[]','diseaseSuspected[]','barcode[]'];
	
		var sample = document.getElementsByName(sampleNames[0]);
		for (var i = 0, iLen = sample.length; i < iLen; i++) {
			species[i]=sample[i].value;
			//console.log(i + " - "+species[i]);
		 }
		 
		var sample = document.getElementsByName(sampleNames[1]);
		for (var i = 0, iLen = sample.length; i < iLen; i++) {
			sampleType[i]=sample[i].value;
			//console.log(i + " - "+sampleType[i]);
		 }
		 
		var sample = document.getElementsByName(sampleNames[2]);
		for (var i = 0, iLen = sample.length; i < iLen; i++) {
			animalAge[i]=sample[i].value;
			//console.log(i + " - "+animalAge[i]);
		 }
		 
		var sample = document.getElementsByName(sampleNames[3]);
		for (var i = 0, iLen = sample.length; i < iLen; i++) {
			animalSex[i]=sample[i].value;
			//console.log(i + " - "+animalSex[i]);
		 }
		 
		 var sample = document.getElementsByName(sampleNames[4]);
		for (var i = 0, iLen = sample.length; i < iLen; i++) {
			animalHistory[i]=sample[i].value;
			//console.log(i + " - "+animalHistory[i]);
		 }
		 
		  var sample = document.getElementsByName(sampleNames[5]);
		for (var i = 0, iLen = sample.length; i < iLen; i++) {
			testsRequired[i]=$('#testsRequired'+i).val();
			console.log(i + " - "+testsRequired[i]);
		 }
		 
		 
		   var sample = document.getElementsByName(sampleNames[6]);
		for (var i = 0, iLen = sample.length; i < iLen; i++) {
			diseaseSuspected[i]=$('#diseaseSuspected'+i).val();
			console.log(i + " - "+diseaseSuspected[i]);
		 }
		 
		 var sample=document.getElementsByName("barcode[]");
			for (var i = 0, iLen = sample.length; i < iLen; i++) {
				barcode[i]=sample[i].value;
				//console.log(i + " - "+barcode[i]);
				
			}
		
		for (var i = 0, iLen = sample.length; i < iLen; i++) {
			lab[i]=$("#lab"+i).val();
			console.log(i + " - "+lab[i]);
			
		}
		
}
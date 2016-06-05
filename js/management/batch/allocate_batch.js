
// Candidate control- start
function moveAll(from, to) {
    $('#'+from+' option').remove().appendTo('#'+to); 
 }
    
function moveSelected(from, to) {
    $('#'+from+' option:selected').remove().appendTo('#'+to); 
 }
    
function selectAll() {
    $("select option").attr("selected","selected");
}
// Candidate control - end

/*
//Get Trainers - start
function getTrainersBySkill(skill,baseUrl){
$.ajax({
	url: baseUrl+"batch/getTrainersBySkill",
	data:{'skill':skill},
	dataType: 'html',
	success: function(data){
		$("#trainersBySkill").html(data);
	},
	type:'POST'
})

}
//Get Trainers - end
*/

//Get Batches - start
function getReleasedBatchesBySkill(skill,baseUrl){
//var selectedSkill = $("#selectedSkill option:selected").val();
//alert(selectedSkill+" - "+batch);return false;
$.ajax({
	url: baseUrl+"batch/getReleasedBatchesBySkill",
	data:{'skill':skill},
	dataType: 'html',
	success: function(data){
/*		if(data == 'timeout'){
			alert(data);
			$(location).attr('href',baseUrl);			
		}*/
		$("#batchesBySkill").html(data);
	},
	type:'POST',
})

}
//Get Batches - end

//Get Candidates - start
function getBatchCandBySkill(batch,baseUrl){	
	var skill = $("#selectedSkill option:selected").val();
	var data = {'skill':skill,'batch':batch};
	$.ajax({
		url: baseUrl+"batch/getBatchCandBySkill",
		data: JSON.stringify(data),
		dataType: 'html',
		success: function(data){
			$("#from").html(data);
		},
		type: 'POST'
	});

}
//Get Candidates - end
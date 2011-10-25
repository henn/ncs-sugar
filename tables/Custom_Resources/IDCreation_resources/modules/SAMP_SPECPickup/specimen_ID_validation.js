/*
	Validate Specimen ID.
*/

var specimenIDOK = true;

function validateID(id){
	$.getJSON("index.php?module=SAMP_BioSpecID&action=EditView&cid=" + id, function(json) 
	{
		if(json.error == "true")
		{
			alert(json.message);			
			specimenIDOK = false;						
		}
		else
		{
			if(json.message != "")
				alert(json.message);
		}	
	});	
}

function is_defined(element){
	if(element === null){
		return false;
	}
	if(element === undefined){
		return false;
	} 
	if(element = ""){
		return false;
	}
	return true;
}

function Ajax(url, id_done, method){
	if(!is_defined(method)){
		method = 'GET';
	}
	
	$.ajax({
        url: url,
        method: method
    }).done(function(html) {
        $(id_done).html(html);
    });
}

$(document).ready(function(){
	$("select").select2();
});
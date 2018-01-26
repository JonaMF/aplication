function __(id){
	return document.getElementById(id);
}

function noRetro(){ 
   window.location.hash="no-back-button";   
   window.location.hash="Again-No-back-button" //chrome 
   window.onhashchange=function(){window.location.hash="no-back-button";}   
}



var fw = fw || {};
fw.returnToSenderTimeout = setTimeout(function(){
	history.go(-1);
}, 500);

// language class

function languageManager() {
	
	//Commented By Gouda.It is passed.
	//this.lang = "en";
		
	this.load = function(lang) {
		this.lang = lang;
		this.url = location.href.substring(0, location.href.lastIndexOf('/'));
		
		document.write("<script language='javascript' src='"+this.url+"/js/gl/accounts_tree/tree/langs/"+this.lang+".js'></script>");
	};
	
	this.addIndexes= function() {
		for (var n in arguments[0]) { 
			this[n] = arguments[0][n]; 
		}
	};	
}
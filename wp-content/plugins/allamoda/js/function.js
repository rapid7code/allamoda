jQuery(function( $ ){
	//Auto post when change.
	jQuery(".auto_post").change(function(){
		var action = $(this).attr("action");
		submit_search_form(action);
	});
	
	//Start date picker.
	//jQuery(".datepicker").datepicker({dateFormat:'yy-mm-dd',showWeek: true, firstDay: 1,showOtherMonths: true, selectOtherMonths: true});
});

///FUNCTIONS FOR SEARCH FORM
function sort_by(order_by, order_type){
	jQuery("input[name=order_by]").val(order_by);
	jQuery("input[name=order_type]").val(order_type);
	jQuery("form[name=search_form]").submit();
}

//submit_search_form
function submit_search_form(action){
	if( action == '' ) return false;
	
	_confirm = true;
	if(action == "delete"){
		_confirm = confirm("Are you sure you want to DELETE selected records?");
	}
	else if(action == "publish"){
		_confirm = confirm("Are you sure you want to PUBLISH selected records?");
	}
	else if(action == "unpublish"){
		_confirm = confirm("Are you sure you want to UN-PUBLISH selected records?");
	}
	else if(action == "active"){
		_confirm = confirm("Are you sure you want to ACTIVE selected members?");
	}
	else if(action == "inactive"){
		_confirm = confirm("Are you sure you want to IN-ACTIVE selected members?");
	}
	else if(action == "block"){
		_confirm = confirm("Are you sure you want to BLOCK selected Comments?");
	}
	else if(action == "unblock"){
		_confirm = confirm("Are you sure you want to UN-BLOCK selected members?");
	}
	else if(action == "send_info"){
		_confirm = confirm("Are you sure you want to Send Account Infomation to selected members?");
	}
	if(_confirm){
		jQuery("input[name=action]").val(action); 
		jQuery("form[name=search_form]").submit();
	}
	else 
		return false;
}
/// END FUNCTIONS FOR SEARCH FORM

function mp_is_email( email ) {

	return ( (/^[a-zA-ZüöäßÄÖÜ]+([\.-_]?[a-zA-ZüöäßÄÖÜ]+)*@[a-zA-ZüöäßÄÖÜ]+([\.-_]?[a-zA-ZüöäßÄÖÜ]+)*(\.\w{2,5})+$/).test( email ) );
}



function mp_is_interger(s){
	var i;
    for (i = 0; i < s.length; i++){   
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}




function mp_strip_chars_in_bag(s, bag){
	var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++){   
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}



function mp_days_in_february (year){
	// February has 29 days in any year evenly divisible by four,
    // EXCEPT for centurial years which are not also divisible by 400.
    return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
}



function mp_days_array(n) {
	for (var i = 1; i <= n; i++) {
		this[i] = 31;
		if (i==4 || i==6 || i==9 || i==11) {this[i] = 30;}
		if (i==2) {this[i] = 29;}
   } 
   return this;
}



function mp_is_date( strDay , strMonth , strYear ){
	// Declaring valid date character, minimum year and maximum year
	var dtCh= "/";
	var minYear=1900;
	var maxYear=2100;
	
	var daysInMonth = mp_days_array(12);	
	
	var strYr=strYear;
	
	if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1);
	if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1);
	for (var i = 1; i <= 3; i++) {
		if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1);
	}
	
	month=parseInt(strMonth);
	day=parseInt(strDay);
	year=parseInt(strYr);
	
	
	if (strMonth.length<1 || month<1 || month>12){
		//alert("Please enter a valid month")
		return false;
	}
	
	if (strDay.length<1 || day<1 || day>31 || (month==2 && day>mp_days_in_february(year)) || day > daysInMonth[month]){
		//alert("Please enter a valid day")
		return false;
	}
	
	if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
		//alert("Please enter a valid 4 digit year between "+minYear+" and "+maxYear)
		return false;
	}
	
	
	return true;
}
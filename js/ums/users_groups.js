function submitform()
{
  document.frm_display_data.submit();
}

function checkUncheck_DisplayDataForm() 
{		
	    	for (var i = 0; i < document.frm_display_data.elements.length; i++ ) 
		    {

		        if (document.frm_display_data.elements[i].type == 'checkbox' && document.frm_display_data.elements[i].id !='chk_all') 
			    {		        		    
		        	document.frm_display_data.elements[i].checked = document.frm_display_data.elements['chk_all'].checked; 
		        }

	    	}
}

function checkUncheck_for_screen(screen_code) 
{		
	
	
	var chk_name_all='chk_'+screen_code+'_all';
	
	var chk_name_view='chk_'+screen_code+'_view';
	var chk_name_add='chk_'+screen_code+'_add';
	var chk_name_edit='chk_'+screen_code+'_edit';
	var chk_name_delete='chk_'+screen_code+'_delete';
	var chk_name_cancel='chk_'+screen_code+'_cancel';

	        		    
	document.frm_process_data.elements[chk_name_view].checked = document.frm_process_data.elements[chk_name_all].checked; 
	document.frm_process_data.elements[chk_name_add].checked = document.frm_process_data.elements[chk_name_all].checked; 
	document.frm_process_data.elements[chk_name_edit].checked = document.frm_process_data.elements[chk_name_all].checked; 
	document.frm_process_data.elements[chk_name_delete].checked = document.frm_process_data.elements[chk_name_all].checked; 
	document.frm_process_data.elements[chk_name_cancel].checked = document.frm_process_data.elements[chk_name_all].checked; 
	 
}

function checkView_for_screen(chk_name,screen_code) 
{		
		var chk_name_view='chk_'+screen_code+'_view';
	
		if(document.frm_process_data.elements[chk_name].checked)
		{
			document.frm_process_data.elements[chk_name_view].checked = true ; 
		}
}

function uncheckByView_for_screen(screen_code) 
{		
		var chk_name_view='chk_'+screen_code+'_view';
		var chk_name_add='chk_'+screen_code+'_add';
		var chk_name_edit='chk_'+screen_code+'_edit';
		var chk_name_delete='chk_'+screen_code+'_delete';
		var chk_name_cancel='chk_'+screen_code+'_cancel';
		
		if(!document.frm_process_data.elements[chk_name_view].checked)
		{
			document.frm_process_data.elements[chk_name_add].checked = false; 
			document.frm_process_data.elements[chk_name_edit].checked = false; 
			document.frm_process_data.elements[chk_name_delete].checked = false; 
			document.frm_process_data.elements[chk_name_cancel].checked = false;  
		}
}


function delete_confirm(lang) {
	if(lang=='english')
	 return confirm('This Row Will Deleted, Are you sure Continue?'); 
	else if(lang=='arabic')
	return confirm('سوف يتم الحذف, هل متأكد انك تريد الاستمرار؟'); 
}

function delete_all_confirm(lang) {
	var there_are_checked=false;
	for (var i = 0; i < document.frm_display_data.elements.length; i++ ) 
    {
        if (document.frm_display_data.elements[i].type == 'checkbox' && document.frm_display_data.elements[i].id !='chk_all') 
	    {		        		    
        	if(document.frm_display_data.elements[i].checked)
        		{
        		there_are_checked=true;
        		break;
        		}
        }
	}
	
	if(there_are_checked)
		{
			if(lang=='english')
			 return confirm('This row will deleted, Are you sure continue?'); 
			else if(lang=='arabic')
			return confirm('سوف يتم الحذف, هل متأكد انك تريد الاستمرار؟');
		}
	else
		{
			if(lang=='english')
				{
					 alert('Please select row or some rows you want delete.');
					 return false;
				}
			 else if(lang=='arabic')
				 {
				 	 alert('من فضلك اختار الصف او الصفوف التى تريد حذفها.');
				 	return false;
				 }
		}
}


function validate_form(lang) {

	
	 if (document.getElementById('txt_code').value=="")
	 {
		 if(lang=='english')
			 alert('Group code reduired');
		 else
			 alert('كود المجموعة مطلوب');
		 
		 document.getElementById('txt_code').focus();
		 return false;
	 }
	 
	 if (document.getElementById('txt_name').value=="")
	 {
		 if(lang=='english')
			 alert('Group name reduired');
		 else
			 alert('اسم المجموعة مطلوب');
		 
		 document.getElementById('txt_name').focus();
		 return false;
	 }

	 
	 return true;
	
}

function sort(url)
{
  var strURL=url;
  var req = GetXmlHttpObject();
  if (req)
  {
    req.onreadystatechange = function()
    {
      if (req.readyState == 4) // only if "OK"
      {
        if (req.status == 200)
        {
          document.getElementById('div_table_display_records').innerHTML=req.responseText;
        } else {
          alert("There was a problem while using XMLHTTP:\n" + req.statusText);
        }
      }
    };
    req.open("GET", strURL, true);
    req.send(null);
  }
  
}


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

	
	 if (document.getElementById('txt_username').value=="")
	 {
		 if(lang=='english')
			 alert('Username reduired');
		 else
			 alert('اسم المستخدم مطلوب');
		 
		 document.getElementById('txt_username').focus();
		 return false;
	 }
	 
	 if (document.getElementById('txt_password').value=="")
	 {
		 if(lang=='english')
			 alert('Password reduired');
		 else
			 alert('كلمة المرور مطلوبة');
		 
		 document.getElementById('txt_password').focus();
		 return false;
	 }
	 
	 if (document.getElementById('txt_name').value=="")
	 {
		 if(lang=='english')
			 alert('Name reduired');
		 else
			 alert('الاسم مطلوب');
		 
		 document.getElementById('txt_name').focus();
		 return false;
	 }
	 
	 if (document.getElementById('drpdwn_user_group').value==0)
	 {
		 if(lang=='english')
			 alert('Group reduired');
		 else
			 alert('المجموعة مطلوب');
		 
		 document.getElementById('drpdwn_user_group').focus();
		 return false;
	 }
	 if (document.getElementById('hdn_user_rule').value==0)
	 {
		 if(lang=='english')
			 alert('Rule reduired');
		 else
			 alert('القاعدة مطلوب');
		 
		 document.getElementById('txt_user_rule').focus();
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


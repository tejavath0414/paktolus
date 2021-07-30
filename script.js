var ajax_url = plugin_ajax_object.ajax_url;
function dateFormat(element){

    var selectedDate = new Date(jQuery(element).val());
    console.log(selectedDate);
    var SelectedD = selectedDate.getDate();
    var SelectedMonth = selectedDate.getMonth()+1;
    var SelectedYear = selectedDate.getFullYear();
   
     if(SelectedD < 10){
       
         SelectedD='0'+SelectedD;
     }

     if(SelectedMonth < 10){

        SelectedMonth = '0'+SelectedMonth;
     }

     var finalDateSelected = SelectedMonth+''+SelectedD+''+SelectedYear;
     
     jQuery('#date_of_birth').val(finalDateSelected);

    console.log(SelectedD);
    console.log(SelectedMonth);
    console.log(SelectedYear);
 

console.log(jQuery(element).val());

}

function updateAuth(element){
    var authVal = jQuery(element).val();
    var data = {

        'action': 'updateAuth',
 
        'Value': authVal
 
       };
 
 
 
       jQuery.ajax({
 
         url: ajax_url,
 
         type: 'post',
 
         data: data,
 
         dataType: 'json',
 
         success: function(response){
 
             // Add new rows to table
 
             // createTableRows(response);
 
             console.log(response);
 
         }
 
       });
    console.log(authVal);
}

function updateAuthurl(element){
    var authVal = jQuery(element).val();
    var data = {

        'action': 'updateApiurl',
 
        'Value': authVal
 
       };
 
 
 
       jQuery.ajax({
 
         url: ajax_url,
 
         type: 'post',
 
         data: data,
 
         dataType: 'json',
 
         success: function(response){
 
             // Add new rows to table
 
             // createTableRows(response);
 
             console.log(response);
 
         }
 
       });
    console.log(authVal);
}
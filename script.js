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


function hippiformSubmit(){
var firstName = (jQuery('#fname').val()).trim();
var lname =(jQuery('#lname').val()).trim();
var streetaddress= (jQuery('#streetaddress').val()).trim();
var unit = (jQuery('#unit').val()).trim();
var city = (jQuery('#city').val()).trim();
var state = (jQuery('#state').val()).trim();
var zipcode=(jQuery('#zipcode').val()).trim();
var date_of_birth =(jQuery('#date_of_birth').val()).trim();
var phonenumber =(jQuery('#phonenumber').val()).trim();
var emailaddress = (jQuery('#emailaddress').val()).trim();
var auth_token= (jQuery('#auth_token').val()).trim();
 
jQuery.get("https://api.staging.myhippo.io/v1/herd/quote?auth_token="+auth_token+"&street="+streetaddress+"&city="+city+"&state="+state+"&zip="+zipcode+"&first_name="+firstName+"&last_name="+lname+"&email="+emailaddress+"&phone="+phonenumber+"&date_of_birth="+date_of_birth, function(data, status){
   console.log(data);
var quoteUrl = data.quote_url;
var coverage = data.coverage_a;
var hippo_id= data.hippo_lead_id;
var pscr= data.pscr;
var quote_id = data.quote_id;
var quote_premium = data.quote_premium;

jQuery('#form_hippo_main').hide();
jQuery('#hippi_quote_url').html(quoteUrl);
jQuery('#hippi_coverage').html(coverage);
jQuery('#hippi_premium').html(quote_premium);
jQuery('#hippi_id').html(quote_id);
jQuery('#quote_final').html('$'+quote_premium);
jQuery('#res_tab').show();
jQuery('#final_text').show();


   console.log(data.quote_url);
   console.log(data.coverage_a);
   console.log(data.hippo_lead_id);
   console.log(data.pscr);
   console.log(data.quote_id);
   console.log(data.quote_premium)
  });

}
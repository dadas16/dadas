$(document).ready(function() {
  $('.numeric').keyup(function() {
    if (this.value.match(/[^0-9]/g)) 
   {
     this.value = this.value.replace(/[^0-9]/g, '');
   }
  });
  $('.alpha').keyup(function() {
    if (this.value.match(/[^a-zA-Z]/g)) 
	{
      this.value = this.value.replace(/[^a-zA-Z]/g, '');
    }
  });
  $('#txtAlphaNumeric').keyup(function() 
  {
    if (this.value.match(/[^a-zA-Z0-9]/g)) 
	{
      this.value = this.value.replace(/[^a-zA-Z0-9]/g, '');
    }
  });
});

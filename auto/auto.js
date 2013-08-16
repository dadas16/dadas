var inputid="";
function lookup(value,idd,e) {
    inputid=idd;
   if((e.keyCode>=65 && e.keyCode<=90) || e.keyCode==8)
    {
        var offsetX = $('#'+idd).offset().left;
	var offsetY = $('#'+idd).offset().top;
	offsetY=parseInt(offsetY)+25;
        $('#suggestions').css({top:offsetY,left:offsetX});
	if(value.length == 0) {
  	$('#suggestions').hide();
	} else {
	$.post("./auto.php", {str: ""+value+"",idd1:""+idd+""}, function(data){
	if(data.length >0 && data!="")
        {
	    $('#autobox').html(data);
	    if($('#arrcntry').val()!="")
		{
		    $('#suggestions').slideDown('slow');
		}
	    else
		{
		   hidee();
		}
	}
		
	});
       }
 }
 else if(e.keyCode==40 || e.keyCode==38 || e.keyCode==13)
   {    
    	    if(e.keyCode==40)
    	     {
            moveselection('down');
          }  
         else if(e.keyCode==38)
         {
            moveselection('up');
          }  
         else
           {
            selection();
           } 
      }
	  
       		
} // lookup
function fill(vale,idd) {
    $('#'+idd).val(vale);
     //setTimeout("$('#suggestions').hide();", 200);
    hidee();
   }
function hidee()
  {
   $('#suggestions').slideUp('200');
  }
function changeclass(id)
  {
    $("#"+id).addClass("active");
  }
function changeclass1(id)
   {
     $("#"+id).removeClass("active");
   }
function selection()
   {
    if($('#autobox li').has('.active'))
       {
         $curval=$(".active").html();
         $('#'+inputid).val($curval);
         hidee();
        }  
      
  }
function moveselection(act)
{
    $resp=$('#arrcntry').val();
    $splt=$resp.split("##");
    $len=$splt.length;
    $len=$len-1;
    if($('#autobox li').has('.active'))
    {
       $curid=$("#autobox li.active").attr('id');
        if($curid==undefined)
        {
              $('#1').addClass('active');
        }
      else
    {
        if($curid>=$len)
        {
        $('#'+$len).removeClass('active');
        $('#1').addClass('active');
        }
        else
         {
       $('#'+$curid).removeClass('active');
         if(act=='down')
          {
            $('#'+$curid).next("li").addClass('active');
          }  
         else if(act=='up')
          {
              $('#'+$curid).prev("li").addClass('active');
	  }  
       }
     }
    }
	      
   }
	

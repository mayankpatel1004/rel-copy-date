<?php
if(isset($_POST["submit"]))
{
	echo "<pre>";
	print_r($_POST);
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Rel Copy Example</title>

<script type="text/javascript" src="jquery/jquery.js"></script>
<script type="text/javascript" src="jquery/relcopy.js"></script>
<script type="text/javascript" src="jquery/date.js"></script>
<script type="text/javascript" src="jquery/datepicker.js"></script>
<link href="css/datePicker.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript1.5">
	Date.firstDayOfWeek = 0;
	Date.format = 'yyyy-mm-dd';
	$(function() 
	{
		$('.date-pick').datePicker({startDate:'1896-01-01'})
		$("form:not(.filter) :input:visible:enabled:first").focus();
				
		jQuery.fn.ForceNumericOnly =function(){
    	return this.each(function()
    	{
			$(this).keydown(function(e)
			{
				var key = e.charCode || e.keyCode || 0;
				return (
					key == 8 || 
					key == 9 ||
					key == 46 ||
					key == 190 ||
					(key >= 37 && key <= 40) ||
					(key >= 48 && key <= 57) ||
					(key >= 96 && key <= 105));
			});
    	});
	 };
	 $(".numeric-val").ForceNumericOnly();
	

	$('.numeric-perc').keyup(function(e){
    if (!isNaN(parseInt(this.value,10))) {
        this.value = parseInt(this.value);
    }
    this.value = this.value.replace(/[^0-9]/g, '');
    if (parseInt(this.value,10) > 100) {
        this.value = 100;
        return;
    }
    });
	});
	
</script>
<script>
function dp()
{
	if(!$('.abc').hasClass('date-pick')) {$('.abc').addClass('date-pick'); $('.abc').datePicker({startDate:'1896-01-01'});};	
}
/*afterNewId:if(this.hasClass('hasDatepicker'))this.removeClass('hasDatepicker'); this.datepicker(jQuery.extend({showMonthAfterYear:false},  {'dateFormat':'mm/dd/yy','showAnim':'fold','changeYear':true,'changeMonth':true}));*/

$(function(){
   	var removeLink = ' <a class="remove" href="#" onclick="$(this).parent().remove(); return false">remove</a>';
	//$('a.copy').relCopy({limit:10, append: removeLink,clearInputs:true,copyClass:'new_',excludeSelector:".desc,.status"});
	$('a.copy').relCopy({limit:0, append: removeLink,clearInputs:true,afterNewId:dp()});
});
</script>
</head>

<body>
   <p><a href="#" class="copy" rel=".phone">Copy Phone</a></p>
   <form name="frm" method="post" action="index.php">
   <table class="phone">
        <tr>
            <td>Phone Number1: 
            	<input type="text" name="ph1[]" />
            </td>
        	<td>Phone Number2: 
            	<input type="text" name="ph2[]" />
            </td>
            <td class="desc">Desc: 
            	<textarea name="desc[]"></textarea>
            </td>
            <td><input type="text" name="datepick[]" readonly="readonly" class="abc" /></td>
            <td class="status">Select :
                <select name="status[]">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </td>
        </tr>
   </table>
   <table><tr><td><input type="submit" name="submit" value="Save" /></td></tr></table>
   </form>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajax Auto Suggest</title>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="auto.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div>
  <div align='center'>
	Type your county:
<br />
	<input type="text"  size="30" value="" id="country" onkeyup="lookup(this.value,'country',event);" autocomplete='off'  onblur='hidee()' >
 </div>
  <div class="suggestionsBox" id="suggestions" style='display:none;'>
      <div class="suggestionList" id="autobox">
       </div>
  </div>
</div>

</body>
</html>

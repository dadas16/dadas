<!-- Welcome to the scripts database of HIOX INDIA      -->
<!-- This tool is developed and a copyright             -->
<!-- product of HIOX INDIA.			        -->
<!-- For more information visit http://www.hscripts.com -->

<?php

   $link = mysql_connect('localhost', 'root','');

   if($link)
   {

 	$dbcon = mysql_select_db($dbname,$link);

	if($dbcon)
	{
	    $result = mysql_query("CREATE TABLE `$tablename` (id BIGINT NOT NULL UNIQUE AUTO_INCREMENT,$fieldname varchar(150)) ",$link);
  		@mysql_free_result($link);
	 	if (!$result)
		{
		    echo(" <table width=100% height=100% align=center><tr><td>
				<table bgcolor=#aaddaa align=center width=300 height=300><tr>
				<td style=\"color: #aa2233; font-size: 15px;\" align=center>
				 Unable to create tables.<br>");
		    echo("Your tables might have already been created.</td></tr></table> </td></tr></table>");
		}
		else
    {       
		  $fields="INSERT INTO `$tablename` (`id`, `$fieldname`) VALUES (1, 'Afghanistan'),(2, 'Aringland Islands'),(3, 'Albania'),(4, 'Algeria'),(5, 'American Samoa'),(6, 'Andorra'),(7, 'Angola'),(8, 'Anguilla'),(9, 'Antarctica'),(10, 'Antigua and Barbuda'),(11, 'Argentina'),(12, 'Armenia'),(13, 'Aruba'),(14, 'Australia'),(15, 'Austria'),(16, 'Azerbaijan'),(17, 'Bahamas'),(18, 'Bahrain'),(19, 'Bangladesh'),(20, 'Barbados'),(21, 'Belarus'),(22, 'Belgium'),(23, 'Belize'),(24, 'Benin'),
(25, 'Bermuda'),(26, 'Bhutan'),(27, 'Bolivia'),(28, 'Bosnia and Herzegovina'),(29, 'Botswana'),(30, 'Bouvet Island'),(31, 'Brazil'),(32, 'British Indian Ocean territory'),(33, 'Brunei Darussalam'),(34, 'Bulgaria'),(35, 'Burkina Faso'),(36, 'Burundi'),(37, 'Cambodia'),(38, 'Cameroon'),(39, 'Canada'),(40, 'Cape Verde'),(41, 'Cayman Islands'),(42, 'Central African Republic'),(43, 'Chad'),(44, 'Chile'),(45, 'China'),(46, 'Christmas Island'),(47, 'Cocos (Keeling) Islands'),(48, 'Colombia'),
(49, 'Comoros'),(50, 'Congo'),(51, 'Congo'),(52, ' Democratic Republic'),(53, 'Cook Islands'),(54, 'Costa Rica'),(55, 'Ivory Coast (Ivory Coast)'),(56, 'Croatia (Hrvatska)'),(57, 'Cuba'),(58, 'Cyprus'),(59, 'Czech Republic'),(60, 'Denmark'),(61, 'Djibouti'),(62, 'Dominica'),(63, 'Dominican Republic'),(64, 'East Timor'),(65, 'Ecuador'),(66, 'Egypt'),(67, 'El Salvador'),(68, 'Equatorial Guinea'),(69, 'Eritrea'),(70, 'Estonia'),(71, 'Ethiopia'),(72, 'Falkland Islands'),(73, 'Faroe Islands'),
(74, 'Fiji'),(75, 'Finland'),(76, 'France'),(77, 'French Guiana'),(78, 'French Polynesia'),(79, 'French Southern Territories'),(80, 'Gabon'),(81, 'Gambia'),(82, 'Georgia'),(83, 'Germany'),(84, 'Ghana'),(85, 'Gibraltar'),(86, 'Greece'),(87, 'Greenland'),(88, 'Grenada'),(89, 'Guadeloupe'),(90, 'Guam'),(91, 'Guatemala'),(92, 'Guinea'),(93, 'Guinea-Bissau'),(94, 'Guyana'),(95, 'Haiti'),(96, 'Heard and McDonald Islands'),(97, 'Honduras'),(98, 'Hong Kong'),(99, 'Hungary'),(100, 'Iceland'),(101, 'India'),(102, 'Indonesia'),(103, 'Iran'),
(104, 'Iraq'),(105, 'Ireland'),(106, 'Israel'),(107, 'Italy'),(108, 'Jamaica'),(109, 'Japan'),(110, 'Jordan'),(111, 'Kazakhstan'),(112, 'Kenya'),(113, 'Kiribati'),(114, 'North Korea'),(115, 'South Korea'),(116, 'Kuwait'),(117, 'Kyrgyzstan'),(118, 'Lao People''s Democratic Republic'),(119, 'Latvia'),(120, 'Lebanon'),(121, 'Lesotho'),(122, 'Liberia'),(123, 'Libyan Arab Jamahiriya'),(124, 'Liechtenstein'),(125, 'Lithuania'),(126, 'Luxembourg'),(127, 'Macao'),(128, 'Macedonia'),(129, 'Madagascar'),(130, 'Malawi'),(131, 'Malaysia'),(132, 'Maldives'),(133, 'Mali'),(134, 'Malta'),(135, 'Marshall Islands'),(136, 'Martinique'),(137, 'Mauritania'),(138, 'Mauritius'),(139, 'Mayotte'),(140, 'Mexico'),(141, 'Micronesia'),(142, 'Moldova'),(143, 'Monaco'),(144, 'Mongolia'),(145, 'Montserrat'),(146, 'Morocco'),(147, 'Mozambique'),
(148, 'Myanmar'),(149, 'Namibia'),(150, 'Nauru'),(151, 'Nepal'),(152, 'Netherlands'),(153, 'Netherlands Antilles'),(154, 'New Caledonia'),(155, 'New Zealand'),(156, 'Nicaragua'),(157, 'Niger'),(158, 'Nigeria'),(159, 'Niue'),(160, 'Norfolk Island'),(161, 'Northern Mariana Islands'),(162, 'Norway'),(163, 'Oman'),(164, 'Pakistan'),(165, 'Palau'),(166, 'Palestinian Territories'),(167, 'Panama'),(168, 'Papua New Guinea'),(169, 'Paraguay'),(170, 'Peru'),(171, 'Philippines'),(172, 'Pitcairn'),(173, 'Poland'),(174, 'Portugal'),(175, 'Puerto Rico'),(176, 'Qatar'),(177, 'Runion'),(178, 'Romania'),(179, 'Russian Federation'),(180, 'Rwanda'),(181, 'Saint Helena'),(182, 'Saint Kitts and Nevis'),(183, 'Saint Lucia'),(184, 'Saint Pierre and Miquelon'),(185, 'Saint Vincent and the Grenadines'),(186, 'Samoa'),(187, 'San Marino'),
(188, 'Sao Tome and Principe'),(189, 'Saudi Arabia'),(190, 'Senegal'),(191, 'Serbia and Montenegro'),(192, 'Seychelles'),(193, 'Sierra Leone'),(194, 'Singapore'),(195, 'Slovakia'),(196, 'Slovenia'),(197, 'Solomon Islands'),(198, 'Somalia'),(199, 'South Africa'),(200, 'South Georgia and the South Sandwich Islands'),(201, 'Spain'),(202, 'Sri Lanka'),(203, 'Sudan'),(204, 'Suriname'),(205, 'Svalbard and Jan Mayen Islands'),(206, 'Swaziland'),(207, 'Sweden'),(208, 'Switzerland'),(209, 'Syria'),(210, 'Taiwan'),(211, 'Tajikistan'),(212, 'Tanzania'),(213, 'Thailand'),(214, 'Togo'),(215, 'Tokelau'),(216, 'Tonga'),(217, 'Trinidad and Tobago'),(218, 'Tunisia'),(219, 'Turkey'),(220, 'Turkmenistan'),(221, 'Turks and Caicos Islands'),(222, 'Tuvalu'),(223, 'Uganda'),(224, 'Ukraine'),(225, 'United Arab Emirates'),(226, 'United Kingdom'),(227, 'United States of America'),(228, 'Uruguay'),(229, 'Uzbekistan'),(230, 'Vanuatu'),(231, 'Vatican City'),(232, 'Venezuela'),(233, 'Vietnam'),(234, 'Virgin Islands (British)'),(235, 'Virgin Islands (US)'),(236, 'Wallis and Futuna Islands'),(237, 'Western Sahara'),(238, 'Yemen'),(239, 'Zaire'),(240, 'Zambia'),(241, 'Zimbabwe')";
                  
		  $res=mysql_query($fields);

        echo "<table align=center width=300 height=300>
       <tr>
           <td style=\"color: #aa2233; font-size: 15px;\" align=center>
                   HIOX DB Installation Manager
           </td>
       </tr>
       <tr bgcolor=#aaddaa>
           <td style=\"color: #000088; font-size: 14px; padding:10px;\">
                  You have succesfully installed the product.<br>
                  Do proceed to work with the product.<br>
                  <br>
                  This utility is provided by HIOX INDIA.<br>
                  For more details log on to <a href=\"http://www.hscripts.com\">hscripts.com</a>
           </td>
       </tr>
    </table>";
		}
	}
	else
	{
		$vv =false;
	}
   }
   else
   {
	$vv =false;
   }

   if($vv === false)
   {
       echo	"<table width=100% height=100% align=center><tr><td>
		<table bgcolor=#aaddaa align=center width=300 height=300><tr>
			<td style=\"color: #aa2233; font-size: 15px;\" align=center>";
       echo "<form method=POST action=$PHP_SELF>";
       echo "<input type=hidden name=type value=changedb>";
       echo "<br><br><br>Unable to connect to the database. <br>
        	Please check your database entries <br><input type=submit value=dbentries>";
       echo "</form>";
       echo(" </td></tr></table> </td></tr></table>");

   }
?>

<!-- Welcome to the scripts database of HIOX INDIA      -->
<!-- This tool is developed and a copyright             -->
<!-- product of HIOX INDIA.			        -->
<!-- For more information visit http://www.hscripts.com -->
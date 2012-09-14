<em>Applications Programmer – Since 1992
</em>

<hr />

<em>Currently available for contract or hire
</em>Tucson, AZ
<a href="mailto: blog@danielrandall.org">blog@danielrandall.org</a>
<h2>Specialties</h2>
<?php
$query_spec  = "SELECT * FROM pp_specialties WHERE user_id='1'";
$specs = mysql_query($query_spec);
echo '<ul>';
while($row_spec=mysql_fetch_assoc($specs))
{
	echo '<li>'.$row_spec["name"].'</li>';
}
echo '</ul>';
?>
<h2>Platforms</h2>
<?php
$query_spec  = "SELECT * FROM pp_platforms WHERE user_id='1'";
$specs = mysql_query($query_spec);
echo '<ul>';
while($row_spec=mysql_fetch_assoc($specs))
{
	echo '<li>'.$row_spec["name"].'</li>';
}
echo '</ul>';
?>
<h2>Languages</h2>
<?php
$query_spec  = "SELECT * FROM pp_languages WHERE user_id='1'";
$specs = mysql_query($query_spec);
echo '<ul>';
while($row_spec=mysql_fetch_assoc($specs))
{
	echo '<li>'.$row_spec["name"].'</li>';
}
echo '</ul>';
?>
<h2>Portfolio</h2>
<?php
$query_comp  = "SELECT * FROM pp_companies WHERE user_id='1' AND summary IS NOT NULL ORDER BY sequence DESC";
$comps = mysql_query($query_comp);
while($row_comp=mysql_fetch_assoc($comps))
{
	echo '<strong>For ';
	if ($row_comp["link"] == "")
	{
		echo '<em>'.$row_comp["name"].'</em>';
	}
	else
	{
		echo '<a href="'.$row_comp["link"].'"><em>'.$row_comp["name"].'</em></a>';
	}
	echo '</strong><br/><em>'.$row_comp["summary"].'</em';
	$query_item  = "SELECT * FROM pp_folio_items WHERE company_id='".$row_comp["id"]."'";
	$items = mysql_query($query_item);
	echo '<ul>';
	while($row_item=mysql_fetch_assoc($items))
	{
		echo '<li>'.$row_item["text"].'</li>';
	}
	echo '</ul>';
}
?>
<br/>
<h2>History</h2>
<?php
$query_comp  = "SELECT * FROM pp_companies WHERE user_id='1' AND start IS NOT NULL ORDER BY sequence DESC";
$comps = mysql_query($query_comp);
while($row_comp=mysql_fetch_assoc($comps))
{
	$start_date = new DateTime($row_comp["start"]);
	$end_date = new DateTime($row_comp["end"]);
	$start_dates = $start_date->format('M Y');
	$end_dates = $end_date->format('M Y');
	
	$query_title  = "SELECT name FROM pp_titles WHERE pp_titles.id='".$row_comp["title_id"]."'";
	$title_result = mysql_query($query_title);
	$title_row = mysql_fetch_row($title_result);
	echo '<strong>'.$title_row[0].' - ';
	if ($row_comp["link"] == "")
	{
		echo '<em>'.$row_comp["name"].'</em>';
	}
	else
	{
		echo '<a href="'.$row_comp["link"].'"><em>'.$row_comp["name"].'</em></a>';
	}
	echo '</strong><br/><em>'.$start_dates.' - '.$end_dates.' ('.$row_comp["location"].')</em';
	$query_item  = "SELECT * FROM pp_work_items WHERE company_id='".$row_comp["id"]."'";
	$items = mysql_query($query_item);
	echo '<ul>';
	while($row_item=mysql_fetch_assoc($items))
	{
		echo '<li>'.$row_item["name"].'</li>';
	}
	echo '</ul>';
}
?>
<hr/>
<em>This page was generated using customized WordPress/MySql/PHP (<a href="https://github.com/DanielLewisRandall/danielrandall.org/blob/master/ProfessionalProfile.php">source on GitHub</a>)</em> 

<?

/*	Copyright Deakin University 2007,2008
 *	Written by Adam Zammit - adam.zammit@deakin.edu.au
 *	For the Deakin Computer Assisted Research Facility: http://www.deakin.edu.au/dcarf/
 *	
 *	This file is part of queXF
 *	
 *	queXF is free software; you can redistribute it and/or modify
 *	it under the terms of the GNU General Public License as published by
 *	the Free Software Foundation; either version 2 of the License, or
 *	(at your option) any later version.
 *	
 *	queXF is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU General Public License for more details.
 *	
 *	You should have received a copy of the GNU General Public License
 *	along with queXF; if not, write to the Free Software
 *	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 */

include_once("../config.inc.php");
include_once("../db.inc.php");
include('../functions/functions.xhtml.php');
include('../functions/functions.import.php');

xhtml_head(T_("Add new questionnaire"));

$a = false;

if (isset($_FILES['form']))
{
	$a = true;
	$filename = $_FILES['form']['tmp_name'];
	$desc = $_POST['desc'];

	$r = newquestionnaire($filename,$desc);
	
	if (!is_array($r) && isset($_FILES['bandingxml']) && !empty($_FILES['bandingxml']['tmp_name']))
	{
		$xmlname = $_FILES['bandingxml']['tmp_name'];
		$r2 =  import_bandingxml(file_get_contents($xmlname),$r);
	}
}


if ($a)
{
	$suc = false;
	if (!is_array($r))
	{
		print "<h1>" . T_("Successfully inserted new questionnaire") . "</h1>";
		$suc = true;
		if (isset($r2))
		{
			if ($r2)
			{
				print "<h2>" . T_("Successfully loaded banding XML file") . "</h2>";
			}
			else
			{
				print "<h2>" . T_("Failed to load banding XML file") . "</h2>";
				$suc = false;
			}
		}
		if ($suc == true)
		{
			print "<div><a href='pagesetup.php?qid=$r'>" . T_("Continue by setting up page edge detection (page setup)") . "</a></div>";
			xhtml_foot();
			die();
		}
	}
	else
	{
		print "<h1>" . T_("Failed to insert new questionnaire. Could have conflicting page id's") . "</h1>";
		print "<p><a href='pagetest.php?filename=" . $r[1] . "'>" . T_("Test form to check for problems") . "</a></p>";
	}


}
//print "<h1>" . T_("New questionnaire") . "</h1>";
//print "<h2>" . T_("When using banding XML:") . "</h2>";
//print "<p>" . T_("You must import the original PDF and banding XML file (not a scanned version)") . "</p>";
//print "<h2>" . T_("When manually banding:") . "</h2>";
//print "<p>" . T_("You will get the best results if you:") . "</p>";
//print "<ul><li>" . T_("Print out the form using the same method that you will for all the printed forms") . "</li>";
//print "<li>" . T_("Scan the (blank) form to a PDF using the same options that you will for the filled forms") . "</li>";
//print "<li>" . T_("Best options for scanning in are:");
//print "<ul><li>" . T_("Monochrome (1 bit)") . "</li>";
//print "<li>" . T_("300DPI Resolution") . "</li></ul></li></ul>";

?>
<div class="row">
	<div class="col-sm-11">

<div class='well page'>


<form enctype="multipart/form-data" class="form-horizontal" action="" method="post">
	<fieldset>
		<legend>New Form</legend>

	<p><input type="hidden" name="MAX_FILE_SIZE" value="1000000000" /></p>
	<div class="form-group">
		<label for="file" class="col-sm-2 control-label"><? echo T_("Select PDF file"); ?>:</label>
		<div class="col-sm-10">
			<input id="file" name="form" type="file" />

		</div>
	</div>
	<div class="form-group">
		<label for="bandingxml" class="col-sm-2 control-label"><? echo T_("(Optional): Select banding XML file"); ?>:</label>
		<div class="col-sm-10">

			<input id="bandingxml" name="bandingxml" type="file" />

		</div>
	</div>
	<div class="form-group">
		<label for="description" class="col-sm-2 control-label">Enter Form Description</label>
		<div class="col-sm-10">

			<input name="desc" id="description" type="text" class="form-control input-lg" placeholder="Description"/><br/>

		</div>
	</div>
	<div class="form-group">
		<label for="description" class="col-sm-2 control-label"></label>
		<div class="col-sm-10">

			<input type="submit" class="btn btn-lg btn-raised btn-primary" value="<? echo T_("Upload form"); ?>" />
		</div>
	</div>
</fieldset>
</form>

</div>

	</div>
	<div class="col-sm-1"></div>

</div>

<?

xhtml_foot();
?>

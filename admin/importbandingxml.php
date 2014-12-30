<?

/*	Copyright Australian Consortium for Social and Political Research Incorporated (ACSPRI) 2010
 *	Written by Adam Zammit - adam.zammit@acspri.org.au
 *	For ACSPRI: http://www.acspri.org.au/
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

xhtml_head(T_("Update banding from XML"));

if (isset($_FILES['bandingxml']) && isset($_POST['qid']) && !empty($_POST['qid']))
{
	$qid = intval($_POST['qid']);
	$a = true;
	$xmlname = $_FILES['bandingxml']['tmp_name'];
	$r =  import_bandingxml(file_get_contents($xmlname),$qid,true);

	if ($a)
	{
		if ($r)
			print "<h2>" . T_("Successfully loaded banding XML file") . "</h2>";
		else
			print "<h2>" . T_("Failed to load banding XML file") . "</h2>";
	}
}

$sql = "SELECT description,qid as value, '' AS selected
	FROM questionnaires";

$rs = $db->GetAll($sql);

?>

<div class="row">
	<div class="col-sm-11">

		<div class='well page'>



<form enctype="multipart/form-data" class="form-horizontal" action="" method="post">
	<fieldset>
		<legend><i class="mdi-content-add"></i> Update banding from XML</legend>
		<p class="text-danger"><small> All previous banding will be erased</small></p>

		<p><input type="hidden" name="MAX_FILE_SIZE" value="1000000000" /></p>

		<div class="form-group">
			<label for="file" class="col-sm-2 control-label"><? echo T_("Select banding XML file"); ?>:</label>
			<div class="col-sm-10">
				<input name="bandingxml" type="file" />
			</div>
		</div>
		<div class="form-group">
			<label for="file" class="col-sm-2 control-label"><? echo T_("Select questionnaire"); ?>:</label>
			<div class="col-sm-10">
				<? display_chooser($rs, 'qid', 'qid', true, false, false, false,false);  ?>
			</div>
		</div>

		<div class="form-group">
			<label for="file" class="col-sm-2 control-label"><? echo T_("Select questionnaire"); ?>:</label>
			<div class="col-sm-10">
				<input class="btn btn-lg btn-raised btn-primary" type="submit" value="<? echo T_("Upload XML"); ?>" />
			</div>
		</div>
</form>

<?

xhtml_foot();
?>

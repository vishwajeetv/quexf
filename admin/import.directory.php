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


include("../functions/functions.import.php");
include("../functions/functions.xhtml.php");
include("../functions/functions.process.php");

if (isset($_POST['dir']) && isset($_POST['watch']))
{
	$dir = $_POST['dir'];
	//start watching process
	start_process(realpath(dirname(__FILE__) . "/process.php") . " $dir");
}

$p = is_process_running();

if ($p)
{
	if (isset($_GET['kill']))
		kill_process($p);

	if (isset($_GET['force_kill']))
		end_process($p);

	xhtml_head(T_("Import a directory of PDF files"),true,array("../css/table.css"),false,false);

	print "<h1>" . T_("Process") . " $p " . T_("running...") . "</h1>";

	if (is_process_killed($p))
	{
		print "<h3>" . T_("Kill signal sent: Please wait..." ) . "</h3>";
		print "<p><a href='?force_kill'>" . T_("Mark the proces as killed (i.e. when the server is rebooted)"). "</a></p>";
	}
	else
		print "<p><a href='?kill=kill'>" . T_("Kill the running process") . "</a> (" . T_("may take up to a few minutes to take effect") .")</p>";

        $d = process_get_data($p);
        if ($d !== false)
        {
                xhtml_table($d,array('process_log_id','datetime','data'),array(T_("Log id"), T_("Date"), T_("Log entry")));
        }

}
else
{
	xhtml_head(T_("Import a directory of PDF files"),true,array("../css/table.css"));

	if (isset($_POST['dir']) && isset($_POST['process']))
	{
		$dir = $_POST['dir'];
		import_directory($dir);
	}

	?>	
	<div class="well pages">
	<h2><? echo T_("Directory"); ?></h2>
	<form enctype="multipart/form-data" class="form-horizontal" action="?" method="post">
		<div class="form-group">
			<label for="description" class="col-sm-2 control-label"><? echo T_("Enter directory local to the server"); ?></label>
			<div class="col-sm-6">

				<input name="dir" class="form-control input-lg" type="text" value="<? echo realpath("../doc/filled"); ?>"/>

			</div>

		</div>
		<div class="form-group">

				<input name='process' class="btn btn-lg btn-success btn-raised" id='process' type="submit" value="<? echo T_("Process directory"); ?>" />
		</div>
		<div class="form-group">

				<input name='watch' class="btn btn-lg btn-primary btn-raised" id='watch' type="submit" value="<? echo T_("Watch this directory"); ?>" />
		</div>
	</form>
<h2>Outcome of last process run (if any)</h2>


	<?


	$d = process_get_last_data(1);
	if ($d !== false)
        {
                xhtml_table($d,array('process_log_id','datetime','data'),array(T_("Log id"), T_("Date"), T_("Log entry")));
        }
	print "</div>";
}
xhtml_foot();
?>

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

/**
 * XHTML functions
 */
include ("../functions/functions.xhtml.php");
include ("../lang.inc.php");
include ("../config.inc.php");

xhtml_head(T_("queXF Admin Functions"),true,array("../css/admin.css"));

?>
<style>
	.menu {
		margin-top: 50px;
		overflow: auto;
		padding: 0;
	}

	.menu, .menu * {
		-webkit-user-select: none;
		-moz-user-select: none;
		user-select: none;
	}

	.menu ul {
		padding: 0;
		margin: 7px 0;
	}

	.menu ul li {
		list-style: none;
		padding-top: 0px;
		padding-bottom: 0px;
		padding-right: 0px;
		padding-left: 0px;
		margin-left: -10px;

		font-size: 15px;
		font-weight: normal;
		cursor: pointer;
	}

	.menu ul li h2 {
		margin-left: 15px;

	}

	.menu ul li.active {
		background-color: #dedede;
		position: relative;
	}

	.menu ul li a {
		color: rgb(51, 51, 51);
		text-decoration: none;
	}


</style>
<div id="menu" class="container-fluid">
<h1><? echo T_("queXF Admin Functions"); ?></h1>
	<nav class="menu">
<ul>
<li><h2><? echo T_("Form setup"); ?></h2>
<ul><li><a class="btn btn-flat btn-default" href="?page=pagetest.php"><? echo T_("Test form compatibility with queXF"); ?></a></li>
<li><a class="btn btn-flat btn-default" href="?page=new.php"><? echo T_("Import a new form from a PDF file"); ?></a></li>
<li><a class="btn btn-flat btn-default" href="?page=importbandingxml.php"><? echo T_("Import/Update banding from XML"); ?></a></li>
<li><a class="btn btn-flat btn-default" href="?page=delete.php"><? echo T_("Delete a form (only if no forms yet imported)"); ?></a></li>
<li><a class="btn btn-flat btn-default" href="?page=touchup.php"><? echo T_("Touch-up a form"); ?></a></li>
<li><a class="btn btn-flat btn-default" href="?page=band.php"><? echo T_("Band a form"); ?></a></li>
<li><a class="btn btn-flat btn-default" href="?page=bandajax.php"><? echo T_("Band a form using interactive banding"); ?></a></li>
<li><a class="btn btn-flat btn-default" href="?page=reorder.php"><? echo T_("Order variables on the form"); ?></a></li>
<li><a class="btn btn-flat btn-default" href="?page=limesurvey.php"><? echo T_("queXS and Limesurvey integration"); ?></a></li></ul></li>
<li><h3><? echo T_("Users"); ?></h3>
<ul><li><a class="btn btn-flat btn-default" href="?page=operators.php"><? echo T_("Add operators"); ?></a></li>
<li><a class="btn btn-flat btn-default" href="?page=verifierquestionnaire.php"><? echo T_("Assign forms to operators"); ?></a></li></ul></li>
<? if (ICR_ENABLED) { ?>
<li><h3><? echo T_("ICR"); ?></h3>
<ul><li><a class="btn btn-flat btn-default" href="?page=icrtrain.php"><? echo T_("Train ICR"); ?></a></li>
<li><a class="btn btn-flat btn-default" href="?page=icrmonitor.php"><? echo T_("Monitor ICR training process"); ?></a></li>
<li><a class="btn btn-flat btn-default" href="?page=icrkb.php"><? echo T_("Import and Export ICR KB"); ?></a></li>
<li><a class="btn btn-flat btn-default" href="?page=icrassign.php"><? echo T_("Assign ICR KB to questionnaire"); ?></a></li></ul></li>
<? } ?>
<li><h3><? echo T_("Importing"); ?></h3>
<ul><li><a class="btn btn-flat btn-default" href="?page=import.directory.php"><? echo T_("Import a directory of PDF files"); ?></a></li>
<li><a class="btn btn-flat btn-default" href="?page=listfiles.php?status=1"><? echo T_("Successfully imported files"); ?></a></li>
<li><a class="btn btn-flat btn-default" href="?page=listfiles.php?status=2"><? echo T_("Failed imported files"); ?></a></li>
<li><a class="btn btn-flat btn-default" href="?page=listduplicates.php"><? echo T_("Duplicate forms"); ?></a></li>
<li><a class="btn btn-flat btn-default" href="?page=listforms.php"><? echo T_("Reverify forms"); ?></a></li>
<li><a class="btn btn-flat btn-default" href="?page=listpagenotes.php"><? echo T_("List page notes"); ?></a></li>
<li><a class="btn btn-flat btn-default" href="?page=pagesmissing.php"><? echo T_("Pages missing from scan"); ?></a></li>
<li><a class="btn btn-flat btn-default" href="?page=missingpages.php"><? echo T_("Handle undetected pages"); ?></a></li></ul></li>
<li><h3><? echo T_("Output"); ?></h3>
<ul><li><a class="btn btn-flat btn-default" href="?page=outputunverified.php"><? echo T_("Output unverified data"); ?></a></li>
<li><a class="btn btn-flat btn-default" href="?page=output.php"><? echo T_("Output data/ddi"); ?></a></li></ul></li>
<li><h3><? echo T_("Progress"); ?></h3>
<ul><li><a class="btn btn-flat btn-default" href="?page=progress.php"><? echo T_("Display progress of form verification"); ?></a></li>
<li><a class="btn btn-flat btn-default" href="?page=performance.php"><? echo T_("Display performance of verifiers (Completions per hour)"); ?></a></li></ul></li>
<li><h3><? echo T_("Clients"); ?></h3>
<ul><li><a class="btn btn-flat btn-default" href="?page=clients.php"><? echo T_("Add clients"); ?></a></li>
<li><a class="btn btn-flat btn-default" href="?page=clientquestionnaire.php"><? echo T_("Assign clients to forms"); ?></a></li></ul></li>
<li><h3><? echo T_("System setup"); ?></h3>
<ul><li><a class="btn btn-flat btn-default" href="?page=pagesetup.php"><? echo T_("Page setup"); ?></a></li>
<li><a class="btn btn-flat btn-default" href="?page=testconfig.php"><? echo T_("Test configuration"); ?></a></li></ul></li>
</ul>
	</nav>
</div>
<?

$page = "testconfig.php";

if (isset($_GET['page']))
	$page = $_GET['page'];

print "<div id='main'>";
xhtml_object($page,"mainobj");
print "</div>";


xhtml_foot();

?>

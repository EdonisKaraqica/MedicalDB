<?php
/**
 * PHP Grid Component
 *
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
 * @version 2.0.0
 * @license: see license.txt included in package
 */

// include db config
include_once("config.php");
session_start();
$username=$_SESSION['CurrentUser'];


// include and create object
include(PHPGRID_LIBPATH."inc/jqgrid_dist_users.php");

// Database config file to be passed in phpgrid constructor
$db_conf = array(
					"type" 		=> PHPGRID_DBTYPE,
					"server" 	=> PHPGRID_DBHOST,
					"user" 		=> PHPGRID_DBUSER,
					"password" 	=> PHPGRID_DBPASS,
					"database" 	=> PHPGRID_DBNAME
				);

$g = new jqgrid($db_conf);

$opt = array();
$opt["rowNum"] = 10; // by default 20
$opt["sortname"] = 'rid'; // by default sort grid by this field
$opt["sortorder"] = "asc"; // ASC or DESC
$opt["caption"] = "Regjistri i kontrollave te " . $username; // caption of grid
//$opt["autowidth"] = true; // expand grid to screen width
$opt["width"] = "100%";
$opt["multiselect"] = true; // allow you to multi-select through checkboxes
$opt["altRows"] = true;
$opt["resizable"] = true;
$opt["altclass"] = "myAltRowClass";
$opt["edit"] = true;
$opt["delete"] = true;

$opt["rowactions"] = true; // allow you to multi-select through checkboxes
$opt["view_options"] = array('width'=>'600');

// export XLS file
// export to excel parameters
// export PDF file params
$grid["export"] = array("filename"=>"RekordetPersonale", "heading"=>"Regjistri i kontrolleve per punetorin", "orientation"=>"landscape", "paper"=>"a4");
// for excel, sheet header
$grid["export"]["sheetname"] = "RekordetPersonale";
// export filtered data or all data
$grid["export"]["range"] = "filtered"; // or "all"

//echo $grid["export"]["range"];
//session_start();
$_SESSION["exprange"] = "filtered";
$g->set_options($opt);

$g->set_actions(array(
	"add"=>false, // allow/disallow add
	"edit"=>false, // allow/disallow edit
	"delete"=>false, // allow/disallow delete
	"rowactions"=>true, // show/hide row wise edit/del/save option
	"showhidecolumns"=>false, // show/hide row wise edit/del/save option
	//"export"=>true, // show/hide export to excel option
	//"export_excel"=>true,
	"export_excel"=>true, // export excel button
	"export_pdf"=>true, // export pdf button
	"handover"=>false, // export pdf button
	//"export_csv"=>true, // export csv button
	"autofilter" => true, // show/hide autofilter for search
	"search" => "simple" // show single/multi field search condition (e.g. simple or advance)
					)
				);

// you can provide custom SQL query to display data
$g->select_command = "SELECT a.rid as rid,
															b.limakid as limakid,
															b.emri as pemri,
															b.mbiemri as pmbiemri,
															b.username as username,
															/*c.emri as demri,
															c.mbiemri as dmbiemri,*/
															concat(c.emri, ' ', c.mbiemri) as demri,
															a.shifra_veprimtarise as shifra_veprimtarise,
															a.anamneza_konstatimi as anamneza_konstatimi,
															a.diagnoza as diagnoza,
															a.terapia as terapia,
															a.ku_udhezohet as ku_udhezohet,
															a.data_regjistrimit as data_regjistrimit,
															a.data_paraqitjes_serishme as data_paraqitjes_serishme,
															a.rdownload as download

FROM ((tblrekordetstaff as a
INNER JOIN tblpacientatstaff as b on a.pid = b.pid)
INNER JOIN tbldoktoret as c on a.did = c.did) where b.username = '$username'";

// this db table will be used for add,edit,delete
$g->table = "tblrekordetstaff";

// you can customize your own columns ...
$col = array();
$col["title"] = "Nr. Dosjes"; // caption of column
$col["name"] = "rid"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "65";
$col["align"] = "center";
//$col["editable"] = true;
$col["hidden"] = false;
//$col["editrules"] = array("edithidden"=>true);
$cols[] = $col;

$col = array();
$col["title"] = "Limak ID"; // caption of column
$col["name"] = "limakid"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "10";
$col["editable"] = false;
$col["hidden"] = true;
//$col["editrules"] = array("edithidden"=>true);
$cols[] = $col;


$col = array();
$col["title"] = "Emri i pacientit";
$col["name"] = "pemri";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["width"] = "100";
$col["editable"] = false;
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Mbiemri i pacientit";
$col["name"] = "pmbiemri";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["width"] = "110";
$col["editable"] = false;
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$col = array();
$col["title"] = "uname";
$col["name"] = "username";
$col["sortable"] = false; // this column is not sortable
$col["search"] = false; // this column is not searchable
$col["width"] = "100";
$col["editable"] = false;
$col["export"] = false;
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = true;
$col["editrules"] = array("edithidden"=>false);

$cols[] = $col;



//$cols[] = $col;

//$col = array();
//$col["title"] = "Mbiemri i doktorit";
//$col["name"] = "dmbiemri";
//$col["sortable"] = true; // this column is not sortable
//$col["search"] = true; // this column is not searchable
//$col["editable"] = false;
//$col["width"] = "105";
//$col["align"] = "center";
//$col["edittype"] = "textarea"; // render as textarea on edit
//$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
//$col["hidden"] = false;
//$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Shifra e v.";
$col["name"] = "shifra_veprimtarise";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "80";
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>false);

$cols[] = $col;

$col = array();
$col["title"] = "Anamneza dhe konstatimi";
$col["name"] = "anamneza_konstatimi";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "160";
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Diagnoza";
$col["name"] = "diagnoza";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "100";
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Terapia";
$col["name"] = "terapia";
$col["width"] = "100";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Ku udhezohet";
$col["name"] = "ku_udhezohet";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["export"] = false;
$col["width"] = "100";
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Data regjistrimit";
$col["name"] = "data_regjistrimit";
$col["width"] = "100";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Data paraqitjes se serishme";
$col["name"] = "data_paraqitjes_serishme";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "160";
$col["export"] = false;
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>false);

$cols[] = $col;

$col = array();
$col["title"] = "Kontrolloi";
$col["name"] = "demri";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["width"] = "100";
$col["editable"] = false;
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Download";
$col["name"] = "download";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
//$col["default"] = "View More";
$col["formatter"] = "function(cellval,options,rowdata){ return '<a target=\"_blank\" href=\"../download.php?id='+cellval+'\">'+\"Download\"+'</a>'; }";
$col["editable"] = true;
$col["export"] = false;
$col["align"] = "center";
$col["width"] = "165";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>false);

$cols[] = $col;
/*
$col = array();
$col["title"] = "Diagnoza";
$col["name"] = "diagnoza";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Terapia";
$col["name"] = "terapia";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Ku udhezohet";
$col["name"] = "ku_udhezohet";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Paraqitja e serishme";
$col["name"] = "paraqitja_serishme";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Cmimi";
$col["name"] = "cmimi";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = true;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;*/

// pass the cooked columns to grid
$g->set_columns($cols);

// generate grid output, with unique grid name as 'list1'
$out = $g->render("list1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<style>
    .myAltRowClass { background-color: #F1F1F1; background-image: none; }


		.ui-jqgrid tr.jqgrow td {white-space: normal !important;}
	</style>

	<link rel="stylesheet" type="text/css" media="screen" href="lib/js/themes/redmond/jquery-ui.custom.css"></link>
	<link rel="stylesheet" type="text/css" media="screen" href="lib/js/jqgrid/css/ui.jqgrid.css"></link>

	<script src="lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>
	<script src="lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
</head>
<body>

	<style>
    .myAltRowClass { background-color: #F1F1F1; background-image: none; }


		.ui-jqgrid tr.jqgrow td {white-space: normal !important;}
	</style>


			<!--<?php echo $g->select_command ?>-->
			<?php echo $out?>

</body>
</html>

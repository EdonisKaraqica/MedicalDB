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

// include and create object
include(PHPGRID_LIBPATH."inc/jqgrid_dist_lista_pacienteve.php");

// Database config file to be passed in phpgrid constructor
$db_conf = array(
					"type" 		=> PHPGRID_DBTYPE,
					"server" 	=> PHPGRID_DBHOST,
					"user" 		=> PHPGRID_DBUSER,
					"password" 	=> PHPGRID_DBPASS,
					"database" 	=> PHPGRID_DBNAME
				);

$g = new jqgrid($db_conf);

// you can provide custom SQL query to display data
$g->select_command = "SELECT * FROM tblpacientatstaff";

// this db table will be used for add,edit,delete
$g->table = "tblpacientatstaff";

// you can customize your own columns ...
$col = array();
$col["title"] = "PID"; // caption of column
$col["name"] = "pid"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["autowidth"] = true;
//$col["editable"] = true;
$col["hidden"] = true;
$col["export"] = false;
//$col["editrules"] = array("edithidden"=>true);
$cols[] = $col;

$col = array();
$col["title"] = "ID"; // caption of column
$col["name"] = "limakid"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "55";
$col["export"] = false;
$col["editable"] = true;
$col["align"] = "center";
$cols[] = $col;

$col = array();
$col["title"] = "Username";
$col["name"] = "username";
$col["dbname"] = "LOWER(name)";
$col["hidden"] = true;
//$col["autowidth"] = true;
$col["export"] = false;
$col["width"] = "50";
$col["editable"] = true; // this column is editable
$col["align"] = "center";
$cols[] = $col;

$col = array();
$col["title"] = "pwd";
$col["name"] = "hashedpwd";
$col["sortable"] = false; // this column is not sortable
$col["search"] = false; // this column is not searchable
$col["editable"] = false;
$col["export"] = false;
$col["align"] = "center";
// $col["edittype"] = "textarea"; // render as textarea on edit
// $col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = true;
$col["editrules"] = array("edithidden"=>false);

$cols[] = $col;

$col = array();
$col["title"] = "salt";
$col["name"] = "salt";
$col["sortable"] = false; // this column is not sortable
$col["search"] = false; // this column is not searchable
$col["editable"] = false;
$col["export"] = false;
$col["align"] = "center";
// $col["edittype"] = "textarea"; // render as textarea on edit
// $col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = true;
$col["editrules"] = array("edithidden"=>false);

$cols[] = $col;

$col = array();
$col["title"] = "Emri (Name)";
$col["name"] = "emri";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "100";
//$col["autowidth"] = true;
$col["align"] = "center";
// $col["edittype"] = "textarea"; // render as textarea on edit
// $col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Prindi (Parent)";
$col["name"] = "prindi";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["export"] = false;
$col["autowidth"] = true;
$col["width"] = "100";
$col["editable"] = true;
$col["align"] = "center";
// $col["edittype"] = "textarea"; // render as textarea on edit
// $col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Mbiemri (Surname)";
$col["name"] = "mbiemri";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["autowidth"] = false;
$col["align"] = "center";
$col["width"] = "100";
// $col["edittype"] = "textarea"; // render as textarea on edit
// $col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Gjinia (Gender)";
$col["name"] = "gjinia";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["autowidth"] = false;
$col["width"] = "50";
$col["align"] = "center";
// $col["edittype"] = "textarea"; // render as textarea on edit
// $col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Ditelindja (DOB)";
$col["name"] = "ditelindja";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["autowidth"] = false;
$col["width"] = "90";
$col["editable"] = true;
$col["align"] = "center";
// $col["edittype"] = "textarea"; // render as textarea on edit
// $col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Vendlindja (POB)";
$col["name"] = "vendlindja";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["export"] = true;
$col["autowidth"] = false;
$col["width"] = "120";
$col["editable"] = true;
$col["align"] = "center";
// $col["edittype"] = "textarea"; // render as textarea on edit
// $col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Adresa (Address)";
$col["name"] = "adresa";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["export"] = false;
$col["width"] = "120";
$col["align"] = "center";
// $col["edittype"] = "textarea"; // render as textarea on edit
// $col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "E-mail";
$col["name"] = "email";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["align"] = "center";
$col["export"] = false;
$col["width"] = "150";
// $col["edittype"] = "textarea"; // render as textarea on edit
// $col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Departamenti (Department)";
$col["name"] = "departamenti";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "100";
$col["align"] = "center";
// $col["edittype"] = "textarea"; // render as textarea on edit
// $col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Njesia (Unit)";
$col["name"] = "Njesia";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "100";
$col["align"] = "center";
// $col["edittype"] = "textarea"; // render as textarea on edit
// $col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>false);

$cols[] = $col;

$col = array();
$col["title"] = "Mbikqyresi (Supervisor)";
$col["name"] = "mbikqyresi";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "100";
$col["align"] = "center";
// $col["edittype"] = "textarea"; // render as textarea on edit
// $col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Tel";
$col["name"] = "nrtel";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["align"] = "center";
$col["width"] = "100";
// $col["edittype"] = "textarea"; // render as textarea on edit
// $col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "token";
$col["name"] = "token";
$col["sortable"] = false; // this column is not sortable
$col["search"] = false; // this column is not searchable
$col["export"] = false;
$col["editable"] = false;
$col["align"] = "center";
// $col["edittype"] = "textarea"; // render as textarea on edit
// $col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = true;
$col["editrules"] = array("edithidden"=>false);

$cols[] = $col;

$col = array();
$col["title"] = "logged";
$col["name"] = "logged";
$col["sortable"] = false; // this column is not sortable
$col["search"] = false; // this column is not searchable
$col["export"] = false;
$col["editable"] = false;
$col["align"] = "center";
// $col["edittype"] = "textarea"; // render as textarea on edit
// $col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = true;
$col["editrules"] = array("edithidden"=>false);

$cols[] = $col;

$col = array();
$col["title"] = "Manager";
$col["name"] = "manager";
$col["sortable"] = false; // this column is not sortable
$col["search"] = false; // this column is not searchable
$col["export"] = false;
$col["editable"] = false;
$col["align"] = "center";
// $col["edittype"] = "textarea"; // render as textarea on edit
// $col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = true;
$col["editrules"] = array("edithidden"=>false);

$cols[] = $col;

$col = array();
$col["title"] = "Supervisor";
$col["name"] = "supervisor";
$col["sortable"] = false; // this column is not sortable
$col["search"] = false; // this column is not searchable
$col["export"] = false;
$col["editable"] = false;
$col["align"] = "center";
// $col["edittype"] = "textarea"; // render as textarea on edit
// $col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = true;
$col["editrules"] = array("edithidden"=>false);

$cols[] = $col;

// pass the cooked columns to grid
$g->set_columns($cols);

$opt = array();
//$opt["rowNum"] = 10; // by default 20
$opt["sortname"] = "pid"; // by default sort grid by this field
$opt["sortorder"] = "desc"; // ASC or DESC
$opt["caption"] = "Lista e stafit"; // caption of grid
//$opt["autowidth"] = true; // expand grid to screen width
$opt["width"] = "100%";
//$opt["height"] = "100%";
$opt["multiselect"] = true; // allow you to multi-select through checkboxes
$opt["altRows"] = true;
$opt["resizable"] = true;
$opt["autoresize"] = true;
$opt["altclass"] = "myAltRowClass";
$grid["shrinkToFit"] = true;
//$grid["width"] = "50";


$opt["rowactions"] = true; // allow you to multi-select through checkboxes


// export XLS file
// export to excel parameters
//$opt["export"] = array("format"=>"pdf", "filename"=>"my-file", "sheetname"=>"test");
//$opt["export_excel"] = array("format"=>"xls", "filename"=>"my-file", "sheetname"=>"test");

// export PDF file params
$grid["export"] = array("filename"=>"LKIA-Stafi", "heading"=>"Stafi i LKIA", "orientation"=>"landscape", "paper"=>"a4");
// for excel, sheet header
$grid["export"]["sheetname"] = "LKIA-Stafi";
// export filtered data or all data
$grid["export"]["range"] = "filtered"; // or "all"

//echo $grid["export"]["range"];
//session_start();
$_SESSION["exprange"] = "filtered";


$g->set_options($opt);

$g->set_actions(array(
						"add"=>true, // allow/disallow add
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


	<?php echo $out?>

</body>
</html>

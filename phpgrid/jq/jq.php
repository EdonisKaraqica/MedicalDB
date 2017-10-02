<?php 
/**
 * PHP Grid Component
 *
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
 * @version 1.5.2
 * @license: see license.txt included in package
 */

// include db config
include_once("config.php");

// set up DB
@mysql_connect(PHPGRID_DBHOST, PHPGRID_DBUSER, PHPGRID_DBPASS);
mysql_select_db(PHPGRID_DBNAME);

// include and create object
// Basepath for lib
include(PHPGRID_LIBPATH."inc/jqgrid_dist.php");

// you can customize your own columns ...

$col = array();
$col["title"] = "Id"; // caption of column
$col["name"] = "id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "50";

$col["editable"] = true; // this column is not editable

$cols[] = $col;		

$col = array();
$col["title"] = "Flight Number";
$col["name"] = "flight_nr";
$col["width"] = "100";
$col["editable"] = true; // this column is not editable
$col["align"] = "center"; 
$col["search"] = true; // this column is not searchable
$cols[] = $col;

///flight date
$col = array();
$col["title"] = "Flight Date";
$col["name"] = "flight_date";
$col["width"] = "100";
$col["editable"] = true; // this column is not editable
$col["align"] = "center"; 
$col["search"] = true; // this column is not searchable
$col["edittype"] = "textarea"; // render as textarea on edit
$cols[] = $col;
//end

///achld
$col = array();
$col["title"] = "A Chld";
$col["name"] = "a_chld";
$col["width"] = "100";
$col["editable"] = true; // this column is not editable
$col["align"] = "center"; 
$col["search"] = true; // this column is not searchable
$col["edittype"] = "textarea"; // render as textarea on edit
$cols[] = $col;
//end

///ainft
$col = array();
$col["title"] = "A Inft";
$col["name"] = "a_inft";
$col["width"] = "100";
$col["editable"] = true; // this column is not editable
$col["align"] = "center"; 
$col["search"] = true; // this column is not searchable
$col["edittype"] = "textarea"; // render as textarea on edit
$cols[] = $col;
//end

///apax
$col = array();
$col["title"] = "A Pax";
$col["name"] = "a_pax";
$col["width"] = "100";
$col["editable"] = true; // this column is not editable
$col["align"] = "center";  
$col["search"] = true; // this column is not searchable
$col["edittype"] = "textarea"; // render as textarea on edit
$cols[] = $col;
//end

///dadlt
$col = array();
$col["title"] = "D Adlt";
$col["name"] = "d_adlt";
$col["width"] = "100";
$col["editable"] = true; // this column is not editable
$col["align"] = "center"; 
$col["search"] = true; // this column is not searchable
$col["edittype"] = "textarea"; // render as textarea on edit
$cols[] = $col;
//end

///dchld
$col = array();
$col["title"] = "D Chld";
$col["name"] = "d_chld";
$col["width"] = "100";
$col["editable"] = true; // this column is not editable
$col["align"] = "center"; 
$col["search"] = true; // this column is not searchable
$col["edittype"] = "textarea"; // render as textarea on edit
$cols[] = $col;
//end

///D Inft
$col = array();
$col["title"] = "D inft";
$col["name"] = "d_inft";
$col["width"] = "100";
$col["editable"] = true; // this column is not editable
$col["align"] = "center"; 
$col["search"] = true; // this column is not searchable
$col["edittype"] = "textarea"; // render as textarea on edit
$cols[] = $col;
//end

///d pax
$col = array();
$col["title"] = "D Pax";
$col["name"] = "d_pax";
$col["width"] = "100";
$col["editable"] = true; // this column is not editable
$col["align"] = "center"; 
$col["search"] = true; // this column is not searchable
$col["edittype"] = "textarea"; // render as textarea on edit
$cols[] = $col;
//end

///a bag
$col = array();
$col["title"] = "A Bag";
$col["name"] = "a_bag";
$col["width"] = "100";
$col["editable"] = true; // this column is not editable
$col["align"] = "center"; 
$col["search"] = true; // this column is not searchable
$col["edittype"] = "textarea"; // render as textarea on edit
$cols[] = $col;
//end

///dbag
$col = array();
$col["title"] = "D Bag";
$col["name"] = "d_bag";
$col["width"] = "100";
$col["editable"] = true; // this column is not editable
$col["align"] = "center"; 
$col["search"] = true; // this column is not searchable
$col["edittype"] = "textarea"; // render as textarea on edit
$cols[] = $col;
//end

///cap apax
$col = array();
$col["title"] = "Cap A Pax";
$col["name"] = "cap_a_pax";
$col["width"] = "100";
$col["editable"] = true; // this column is not editable
$col["align"] = "center"; 
$col["search"] = true; // this column is not searchable
$col["edittype"] = "textarea"; // render as textarea on edit
$cols[] = $col;
//end

///cap d pax
$col = array();
$col["title"] = "Cap D Pax";
$col["name"] = "cap_d_pax";
$col["width"] = "100";
$col["editable"] = true; // this column is not editable
$col["align"] = "center"; 
$col["search"] = true; // this column is not searchable
$col["edittype"] = "textarea"; // render as textarea on edit
$cols[] = $col;
//end

///cap d pax
$col = array();
$col["title"] = "Cap D Pax";
$col["name"] = "cap_d_pax";
$col["width"] = "100";
$col["editable"] = true; // this column is not editable
$col["align"] = "center"; 
$col["search"] = true; // this column is not searchable
$col["edittype"] = "textarea"; // render as textarea on edit
$cols[] = $col;
//end

///cap d pax
$col = array();
$col["title"] = "Cap D Pax";
$col["name"] = "cap_d_pax";
$col["width"] = "100";
$col["editable"] = true; // this column is not editable
$col["align"] = "center"; 
$col["search"] = true; // this column is not searchable
$col["edittype"] = "textarea"; // render as textarea on edit
$cols[] = $col;
//end

///pc in
$col = array();
$col["title"] = "PC In";
$col["name"] = "pc_in";
$col["width"] = "100";
$col["editable"] = true; // this column is not editable
$col["align"] = "center"; 
$col["search"] = true; // this column is not searchable
$col["edittype"] = "textarea"; // render as textarea on edit
$cols[] = $col;
//end

///pc out
$col = array();
$col["title"] = "PC Out";
$col["name"] = "pc_out";
$col["width"] = "100";
$col["editable"] = true; // this column is not editable
$col["align"] = "center"; 
$col["search"] = true; // this column is not searchable
$col["edittype"] = "textarea"; // render as textarea on edit
$cols[] = $col;
//end

///c class
$col = array();
$col["title"] = "C Class";
$col["name"] = "c_class";
$col["width"] = "100";
$col["editable"] = true; // this column is not editable
$col["align"] = "center"; 
$col["search"] = true; // this column is not searchable
$col["edittype"] = "textarea"; // render as textarea on edit
$cols[] = $col;
//end

///initials
$col = array();
$col["title"] = "Initials";
$col["name"] = "initials";
$col["width"] = "100";
$col["editable"] = true; // this column is not editable
$col["align"] = "center"; 
$col["search"] = true; // this column is not searchable
$col["edittype"] = "textarea"; // render as textarea on edit
$cols[] = $col;
//end

///user
$col = array();
$col["title"] = "User";
$col["name"] = "user";
$col["width"] = "100";
$col["editable"] = true; // this column is not editable
$col["align"] = "center"; 
$col["search"] = true; // this column is not searchable
$col["edittype"] = "textarea"; // render as textarea on edit
$cols[] = $col;
//end

///regiater
$col = array();
$col["title"] = "Register";
$col["name"] = "register";
$col["width"] = "100";
$col["editable"] = true; // this column is not editable
$col["align"] = "center"; 
$col["search"] = true; // this column is not searchable
$col["edittype"] = "textarea"; // render as textarea on edit
$cols[] = $col;
//end

$g = new jqgrid();

$grid["rowNum"] = 10; // by default 20
$grid["sortname"] = 'id'; // by default sort grid by this field
$grid["sortorder"] = "desc"; // ASC or DESC
$grid["caption"] = "Invoice Data"; // caption of grid
$grid["autowidth"] = true; // expand grid to screen width
$grid["multiselect"] = true; // allow you to multi-select through checkboxes

$grid["altRows"] = true; 
$grid["altclass"] = "myAltRowClass"; 

$grid["rowactions"] = true; // allow you to multi-select through checkboxes


// export PDF file params
$grid["export"] = array("filename"=>"my-file", "heading"=>"Invoice Details", "orientation"=>"landscape", "paper"=>"a4");
// for excel, sheet header
$grid["export"]["sheetname"] = "Invoice Details";

// export filtered data or all data
$grid["export"]["range"] = "filtered"; // or "all"


// RTL support
$grid["direction"] = "ltr";

$g->set_options($grid);

$g->set_actions(array(	
						"add"=>true, // allow/disallow add
						"edit"=>true, // allow/disallow edit
						"delete"=>false, // allow/disallow delete
						"rowactions"=>true, // show/hide row wise edit/del/save option
						"export_excel"=>true, // show/hide export to excel option - must set export xlsx params
						"export_pdf"=>true, // show/hide export to pdf option - must set pdf params
                        "export_csv"=>true, // export excel button 
						"autofilter" => true, // show/hide autofilter for search
						"bulkedit"=>true,                           
                        "view"=>true,
                        "rowactions"=>true,
                        "export"=>true,
                        "inlineadd" => true,
                        "showhidecolumns" => true,
						"search" => "advance" // show single/multi field search condition (e.g. simple or advance)
			
					) 
				);

// you can provide custom SQL query to display data
$g->select_command = "SELECT * FROM lctable";

// this db table will be used for add,edit,delete
$g->table = "lctable";

// pass the cooked columns to grid
$g->set_columns($cols);

// generate grid output, with unique grid name as 'list1'
$out = $g->render("list1");





?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" media="screen" href="lib/js/themes/redmond/jquery-ui.custom.css"></link>	
	<link rel="stylesheet" type="text/css" media="screen" href="lib/js/jqgrid/css/ui.jqgrid.css"></link>	
	
	<script src="lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
	<script src="lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
</head>
<body>
	<style>
    .myAltRowClass { background-color: #DDDDDC; background-image: none; }
	</style>
	<div style="margin:10px">
	<?php echo $out?>
	</div>
</body>
</html>

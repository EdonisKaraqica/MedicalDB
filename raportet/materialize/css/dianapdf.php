<?php

require('fpdf181/fpdf.php');
require_once( 'databaze.php');
session_start();





/************************************/
/* global functions                 */
/************************************/
function hex2dec($color = "#000000")
{
    $tbl_color = array();
    $tbl_color['R']=hexdec(substr($color, 1, 2));
    $tbl_color['G']=hexdec(substr($color, 3, 2));
    $tbl_color['B']=hexdec(substr($color, 5, 2));
    return $tbl_color;
}

function px2mm($px) { return $px*25.4/72; }

function txtentities($html)
{
    $trans = get_html_translation_table(HTML_ENTITIES);
    $trans = array_flip($trans);
    return strtr($html, $trans);
}

/************************************/
/* main class createPDF             */
/************************************/
class createPDF 
{

    function __construct($post) 
    {
    	
        //input nga forma 
		$this->emri=$_POST['emri'];
        $this->telefoniInput=$_POST['telefoni'];
		$this->numriID=$_POST['numriID'];
		$this->adresaInput=$_POST['adresa'];
		$this->ditelindjaInput=$_POST['ditelindja'];
        $this->emailInput=$_POST['email'];
        $this->vendlindja=$_POST['vendlindja'];
        $this->gjiniaInput=$_POST['gjinia'];
        $this->nrDosjes=$_POST['nrDosjes'];
        $this->njesiaInput=$_POST['njesia'];

        $this->ankesaInput=$_POST['ankesa'];
        $this->anamneza=$_POST['anamneza'];
        $this->ekzaminimi=$_POST['fizikal'];
        $this->anamnezaFamiljes=$_POST['anFamiljes'];
        $this->perfundim=$_POST['perfundimi'];
        $this->trajtim=$_POST['trajtimi'];
        $this->laborator=$_POST['laboratori'];

        $this->raportMjeksor=$_POST['rap'];

        $this->receta=$_POST['diagnozaRec'];
        $this->rp=$_POST['rp'];

        $this->udhPer=$_POST['udhPer'];
        $this->diagnozaKonsult=$_POST['diagnoza'];
        $this->gjPrez=$_POST['gjPrez'];
        $this->terapiaAp=$_POST['terapiaAp'];

        $this->udhPerLab=$_POST['udhPerLab'];
        $this->diagnozaLab=$_POST['diagnozaLab'];
        $this->gjPrezLab=$_POST['gjPrezLab'];
        $this->terLab=$_POST['terLab'];

        $this->udhezohetPerRent=$_POST['udhezohetPerRent'];
        $this->diagnozaRent=$_POST['diagnozaRent'];
        $this->gjPrezenteRent=$_POST['gjPrezenteRent'];
        $this->terapiaApRent=$_POST['terapiaApRent'];

        $this->origjina=$_POST['origjina'];
        $this->destinacioni=$_POST['destinacioni'];
        $this->shenime=$_POST['shenime'];

        $this->qellimiLar=$_POST['qellimiLar'];
        $this->prej=$_POST['prej'];
        $this->deriInput=$_POST['deri'];
				
        // other options
        $this->from='iso-8859-2';         // input encoding
        $this->to='cp1250';               // output encoding
        $this->useiconv=false;            // use iconv
        $this->bi=true;                   // support bold and italic tags
        
        define('EeMadhe',chr(203));
		define('EeVogel',chr(235));

        //variablat statike 
        $this->titulli = "Limak Kosovo International Airport J.S.C.";
        $this->titulli1 = "Sh". EeVogel."rbimi mjek".EeVogel."sor/ Medical Service";
		$this->raportTitulli = "<STRONG align='center'>RAPORT MJEK".EeMadhe."SOR</STRONG>";

        
        //PJESA 1
        $this->te_dhenat="<B>T".EeMadhe." DH".EeMadhe."NAT E P".EeMadhe."RGJITHSHME</B><EM> (GENERAL DATA):</EM>";
        $this->emri_mbiemri="<pre>EMRI & MBIEMRI</pre><i> (Full Name):</i>";
        $this->nr_id="<pre>NR. ID</pre><i>(ID No.):</i>";
        $this->ditelindja="<pre>DIT".EeMadhe."LINDJA</pre><i> (DOB):</i>";
        $this->vendi_lindjes="<pre>VENDI I LINDJES</pre><i> (POB):</i>";
        $this->gjinia="<pre>GJINIA</pre><i> (Gender):</i>";
        $this->nr_dosjes="<pre>NR. DOSJES</pre><i> (File No.):</i>";
        $this->njesia="<pre>NJ".EeMadhe."SIA</pre><i> (Unit):</i>";
        $this->adresa="<pre>ADRESA</pre><i> (Address):</i>";
        $this->email="<pre>EMAIL:</pre><i></i>";
        $this->telefoni="<pre>TEL</pre><i> (Telephone):</i>";
       
        $this->ankesa="<pre>ANKESA</pre><i> (Complaint):</i>";
        $this->anamneza_semundjes="<pre>ANAMNEZA E S".EeMadhe."MUNDJES</pre><i> (Disease Semantics):</i>";
        $this->ekzaminimi_fizikal="<pre>EKZAMINIMI FIZIKAL</pre><i> (Physical Examination):</i>";
        $this->anamneza_familjes="<pre>ANAMNEZA E FAMILJES</pre><i> (Family Semantics):</i>";
        $this->perfundimi="<pre>P".EeMadhe."RFUNDIMI</pre><i> (Conclusion):</i>";
        $this->trajtimi="<pre>TRAJTIMI</pre><i> (Medical Treatment):</i>";
        $this->laboratori="<pre>LABORATORI</pre><i> (Laboratory):</i>";
        
        //PJESA 2
        $this->raport_mjekesor="<B>RAPORT MJEK".EeMadhe."SOR</B><i> (MEDICAL REPORT)</i>";
        $this->raporti="<pre>Raporti</pre><i> (Report):</i>";
        
        //PJESA 3
        $this->Recete = "<B>RECET".EeMadhe."</B><i> (RECIPE)</i>";
        $this->Diagnoza = "<pre>Diagnoza</pre><i> (Diagnosis):</i>";
        $this->Rp = "<pre>Rp</pre><i> (Rp):</i>";
        
        //PJESA 4
        $this->udhezim_konsultime="<B>UDH".EeMadhe."ZIM P".EeMadhe."R KONSULTIME</B><i> (MEDICAL GUIDANCE FOR CONSULTATION)</i>";
        $this->udhezohet_per="<pre>Udh".EeVogel."zohet p".EeVogel."r</pre><i> (Guided for):</i>";
        $this->diagnoza="<pre>Diagnoza</pre><i> (Diagnosis):</i>";
        $this->gjendja_pre="<pre>Gjendja prezente</pre><i> (Present condition):</i>";
        $this->terapia_apl="<pre>Terapia e aplikuar</pre><i> (Applied therapy):</i>";
        
        //PJESA 5
        $this->udhezim_laborator="<B>UDH".EeMadhe."ZIM P".EeMadhe."R EKZAMINIME LABORATORIKE</B><i> (MEDICAL GUIDANCE FOR LABORATORY EXAMINATIONS)</i>";
        $this->udhezohet="<pre>Udh".EeVogel."zohet p".EeVogel."r</pre><i> (Guided for):</i>";
        $this->diagnozau="<pre>Diagnoza</pre><i> (Diagnosis):</i>";
        $this->gjendja_p="<pre>Gjendja prezente</pre><i> (Present Condition):</i>";
        $this->terapia_ap="<pre>Terapia e aplikuar</pre><i> (Applied therapy):</i>";
        
        //PJESA 6
        $this->udhezim_rentgen="<B>UDH".EeMadhe."ZIM P".EeMadhe."R EKZAMINIME RENTGENOLOGJIKE </B><i> (Medical guidance for roentgenological examinations)</i>";
         $this->udhezoheet="<pre>Udh".EeVogel."zohet p".EeVogel."r</pre><i> (Guided for):</i>";
        $this->diagnozaau="<pre>Diagnoza</pre><i> (Diagnosis):</i>";
        $this->gjeendja_p="<pre>Gjendja prezente</pre><i> (Present Condition):</i>";
        $this->terapia_aplikuar="<pre>Terapia e aplikuar</pre><i> (Applied Therapy):</i>";
        
        //PJESA 7
        $this->raport_pasagjer="<B>RAPORT UDH".EeMadhe."TIMI P".EeMadhe."R PASAGJER </B><i> (TRAVEL REPORT FOR PASSENGER)</i>";
     	$this->origjinap="<pre>Origjina</pre><i> (Origin):</i>";
        $this->destinimip="<pre>Destinimi</pre><i> (Destination):</i>";
        $this->shenimep="<pre>Sh".EeVogel."nime</pre><i> (Notes):</i>";
        $this->notep="The passenger signed below here by confirms that concerning his health condition at the present time takes all responsibility towards the Airlines, its employees and its representative in connection with this flight. She or he is responsible for any damages, injuries or other complications, as well as additional expense, which may arise for the Airlines.    ";
        $this->passengersignature="<PRE>Passenger:</PRE>";
        $this->psignature="<i>  __________________________</i>";
        
        //PJESA 8
        $this->leje_largimi="<B>LEJE P".EeMadhe."R LARGIM NGA VENDI I PUN".EeMadhe."S </B><i> (PERMIT TO LEAVE WORK)</i>";
        $this->qellimi_largimit="<pre>Q".EeVogel."llimi i largimit</pre><i> (Reason for leaving): </i>";
        $this->koha_largimit="<pre>Koha e largimit</pre><i> (Time Of Leave): </i><pre>Prej </pre><i>(From):</i>";
        $this->deri="<pre>Deri </pre><i>(To):</i>";
        $this->doctorsignature="<pre>Doktori</pre><i> (Doctor):</i>";
        $this->dsignature="  __________________________";
    }

    function _convert($s) 
    {
        if ($this->useiconv) 
            return iconv($this->from,$this->to,$s); 
        else 
            return $s;
    }

    function run() 
    {
    	$pdf=new PDF('P','mm','A4',$this->titulli,$this->titulli1,false);
        $pdf->AddPage();
		       
        $pdf->Ln(5);
		$pdf->WriteHTML($this->raportTitulli);
        $pdf->Ln(2);
        
		//1.TE DHENAT E PERGJITHSHME
		$pdf->WriteHTML($this->te_dhenat);
		$pdf->Ln(10);

     	//Rreshti nje
		$pdf->WriteHTML($this->emri_mbiemri);
		$pdf->Cell(2);
		$pdf->Cell(60,9,$this->emri,1,0);
		$pdf->Cell(3,5,"",0,0);
		$pdf->WriteHTML($this->nr_id);
		$pdf->Cell(10.7);
		$pdf->Cell(52,9,$this->numriID,1,1);
     
		$pdf->Cell(500,1,"",0,1);
		
		//Rreshti dy
		$pdf->WriteHTML($this->adresa);
		$pdf->Cell(18.5,10,"",0,0);
		$pdf->Cell(60,9,$this->adresaInput,1,0);
		$pdf->Cell(3,10,"",0,0);
		$pdf->WriteHTML($this->telefoni);
		$pdf->Cell(8);
		$pdf->Cell(52,10,$this->telefoniInput,1,1);
     
		$pdf->Cell(500,1,"",0,1);

		//Rreshti tre
		$pdf->WriteHTML($this->vendi_lindjes);
		$pdf->Cell(9.7);
		$pdf->Cell(60,9,$this->vendlindja,1,0);
		$pdf->Cell(3,10,"",0,0);
		$pdf->WriteHTML($this->ditelindja);
		$pdf->Cell(2.5);
		$pdf->Cell(52,10,$this->ditelindjaInput,1,1);
     
		$pdf->Cell(500,1,"",0,1);

		//Rreshti kater
		$pdf->WriteHTML($this->gjinia);
		$pdf->Cell(22.7);
		$pdf->Cell(60,10,$this->gjiniaInput,1,0);
		$pdf->Cell(3,10,"",0,0);
		$pdf->WriteHTML($this->email);
		$pdf->Cell(21.8);
		$pdf->Cell(52,10,$this->emailInput,1,1);
     
		$pdf->Cell(500,1,"",0,1);

		//Rreshti pese
		$pdf->WriteHTML($this->nr_dosjes);
		$pdf->Cell(12.7);
		$pdf->Cell(60,10,$this->nrDosjes,1,0);
		$pdf->Cell(3,10,"",0,0);
		$pdf->WriteHTML($this->njesia);
		$pdf->Cell(11.4);
		$pdf->Cell(52,10,$this->njesiaInput,1,1);
     
		$pdf->Cell(500,10,"",0,1);
		$pdf->WriteHTML($this->ankesa);
		$pdf->Cell(2);
		$pdf->MultiCell(162,5,$this->ankesaInput,1,"L",false);
     
		$pdf->Cell(500,5,"",0,1);
		$pdf->WriteHTML($this->anamneza_semundjes);
		$pdf->Cell(2);
		$pdf->MultiCell(117.8,5,$this->anamneza,1,"L",false);
    
		$pdf->Cell(500,5,"",0,1);
		$pdf->WriteHTML($this->ekzaminimi_fizikal);
		$pdf->Cell(10.2);
		$pdf->MultiCell(118,5,$this->ekzaminimi,1,"L",false);
     
		$pdf->Cell(500,5,"",0,1);
		$pdf->WriteHTML($this->anamneza_familjes);
		$pdf->Cell(9);
		$pdf->MultiCell(118,5,$this->anamnezaFamiljes,1,"L",false);
      
		$pdf->Cell(500,5,"",0,1);
        $pdf->WriteHTML($this->perfundimi);
		$pdf->Cell(7.8);
		$pdf->MultiCell(147.5,5,$this->perfundim,1,"L",false);
            
		$pdf->Cell(500,5,"",0,1);
		$pdf->WriteHTML($this->trajtimi);
		$pdf->Cell(3.5);
		$pdf->MultiCell(147,5,$this->trajtim,1,"L",false);
      
		$pdf->Cell(500,5,"",0,1);
		$pdf->WriteHTML($this->laboratori);
		$pdf->Cell(7.8);
		$pdf->MultiCell(147,5,$this->laborator,1,"L",false);
        
        //$pdf->SetAutoPageBreak(true,50); 
		$pdf->PutLine(5,20,420,20);
		if (!empty($_POST["rap"])) {
			//2.RAPORT MJEKESOR
			$pdf->WriteHTML($this->raport_mjekesor);
			$pdf->Cell(100);
			$pdf->Cell(100);
	     
			$pdf->WriteHTML($this->raporti);
			$pdf->Cell(2);
			$pdf->MultiCell(170,5,$this->raportMjeksor,1,'L',false);
			$pdf->PutLine(5,20,420,20);
		}
		if (!empty($_POST["diagnozaRec"])||!empty($_POST["rp"])) {
			//3.RECETE
			$pdf->WriteHTML($this->Recete);
			$pdf->Cell(100);
			$pdf->Cell(100);
	     
			$pdf->WriteHTML($this->Diagnoza);
			$pdf->Cell(2);
			$pdf->MultiCell(161.5,5,$this->receta,1,'L',false);
			$pdf->Cell(3,5,"",0,1);
	     
			$pdf->WriteHTML($this->Rp);
			$pdf->Cell(22.3);
			$pdf->MultiCell(161.5,5,$this->rp,1,'L',false);
			$pdf->PutLine(5,20,420,20);
		}
  		if (!empty($_POST["udhPer"])||!empty($_POST["diagnoza"])||!empty($_POST["gjPrez"])||!empty($_POST["terapiaAp"])) {
			//4.UDHEZIM PER KONSULTIME
			$pdf->WriteHTML($this->udhezim_konsultime);
			$pdf->Cell(100);
			$pdf->Cell(100);
	     
			$pdf->WriteHTML($this->udhezohet_per);
			$pdf->Cell(2);
			$pdf->MultiCell(152.5,5,$this->udhPer,1,'L',false);
			
			$pdf->Cell(3,5,"",0,1);
	        $pdf->WriteHTML($this->diagnoza);
			$pdf->Cell(10.8);
			$pdf->MultiCell(152.5,5,$this->diagnozaKonsult,1,'L',false);
			$pdf->Cell(3,5,"",0,1);
	     
			$pdf->WriteHTML($this->gjendja_p);
			$pdf->Cell(2);
			$pdf->MultiCell(138,5,$this->gjPrez,1,'L',false);
			$pdf->Cell(3,5,"",0,1);
	     
			$pdf->WriteHTML($this->terapia_apl);
			$pdf->Cell(3.8);
			$pdf->MultiCell(138,5,$this->terapiaAp,1,'L',false);
			$pdf->PutLine(5,20,420,20);
	  		//$pdf->SetAutoPageBreak(true,150); 
	}
		if (!empty($_POST["udhPerLab"])||!empty($_POST["diagnozaLab"])||!empty($_POST["gjPrezLab"])||!empty($_POST["terLab"])) {

			//5.UDHEZIM PER EKZAMINIME LABORATORIKE
			$pdf->WriteHTML($this->udhezim_laborator);
			$pdf->Cell(100);
			$pdf->Cell(100);
	     
			$pdf->WriteHTML($this->udhezohet);
			$pdf->Cell(2);
			$pdf->MultiCell(152,5,$this->udhPerLab,1,'L',false);
			$pdf->Cell(3,5,"",0,1);
	          
			$pdf->WriteHTML($this->diagnozau);
			$pdf->Cell(10.9);
			$pdf->MultiCell(152,5,$this->diagnozaLab,1,'L',false);
			$pdf->Cell(3,5,"",0,1);
	     
			$pdf->WriteHTML($this->gjendja_pre);
			$pdf->Cell(2);
			$pdf->MultiCell(138,5,$this->gjPrezLab,1,'L',false);
			$pdf->Cell(3,5,"",0,1);
	     
			$pdf->WriteHTML($this->terapia_ap);
			$pdf->Cell(3);
			$pdf->MultiCell(138,5,$this->terLab,1,'L',false);
			$pdf->PutLine(5,20,420,20);
	}
	if (!empty($_POST["qellimiLar"])||!empty($_POST["prej"])||!empty($_POST["deri"])) {

  		
  		//8.LEJE PER LARGIM NGA PUNA
		$pdf->WriteHTML($this->leje_largimi);
		$pdf->Cell(100);
		$pdf->Cell(100);
     
		$pdf->WriteHTML($this->qellimi_largimit);
		$pdf->Cell(2);
		$pdf->MultiCell(136,5,$this->qellimiLar,1,'L',false);
		$pdf->Cell(3,5,"",0,1);
     
		$pdf->WriteHTML($this->koha_largimit);
		$pdf->Cell(2);
		$pdf->Cell(55,5,$this->prej,1,0);
		$pdf->Cell(2,20,"",0,0);
		$pdf->WriteHTML($this->deri);
		$pdf->Cell(2);
		$pdf->Cell(52,5,$this->deriInput,1,0);
		$pdf->PutLine(5,20,420,20);
  			
  		//$pdf->SetAutoPageBreak(true,90); 
	}
		if (!empty($_POST["udhezohetPerRent"])||!empty($_POST["diagnozaRent"])||!empty($_POST["gjPrezenteRent"])||!empty($_POST["terapiaApRent"])) {

		//6.UDHEZIM PER EKZAMINIME RENTGENOLOGJIKE
		$pdf->WriteHTML($this->udhezim_rentgen);
		$pdf->Cell(100);
		$pdf->Cell(100);
     	
     	$pdf->WriteHTML($this->udhezohet);
		$pdf->Cell(2.5);
		$pdf->MultiCell(149.5,5,$this->udhezohetPerRent,1,'L',false);
		$pdf->Cell(3,5,"",0,1);
          
		$pdf->WriteHTML($this->diagnozau);
		$pdf->Cell(11.5);
		$pdf->MultiCell(149.5,5,$this->diagnozaRent,1,'L',false);
		$pdf->Cell(3,5,"",0,1);
     
		$pdf->WriteHTML($this->gjendja_pre);
		$pdf->Cell(2.5);
		$pdf->MultiCell(136,5,$this->gjPrezenteRent,1,'L',false);
		$pdf->Cell(3,5,"",0,1);
     
		$pdf->WriteHTML($this->terapia_ap);
		$pdf->Cell(3.8);
		$pdf->MultiCell(136,5,$this->terapiaApRent,1,'L',false);
		$pdf->PutLine(5,20,420,20);
  		
		//$pdf->SetAutoPageBreak(true,50); 
	}
		if (!empty($_POST["origjina"])||!empty($_POST["destinacioni"])||!empty($_POST["shenime"])) {

		//7. RAPORT UDHETIMI PER PASAGJER
		$pdf->WriteHTML($this->raport_pasagjer);
		$pdf->Cell(100);
		$pdf->Cell(100);
          
		$pdf->WriteHTML($this->origjinap);
		$pdf->Cell(3.2);
		$pdf->MultiCell(63,5,$this->origjina,1,'L',false);
		$pdf->Cell(2,13,"",0,0);
     
		$pdf->WriteHTML($this->destinimip);
		$pdf->Cell(3);
		$pdf->MultiCell(63,5,$this->destinacioni,1,'L',false);
		$pdf->Ln(13);
     
		$pdf->WriteHTML($this->shenimep);
		$pdf->Cell(2);
		$pdf->MultiCell(165,5,$this->shenime,1,'L',false);
		$pdf->Ln(5);     
		$pdf->MultiCell(200,5,$this->notep,0,'L');

		$pdf->WriteHTML($this->passengersignature);
		$pdf->WriteHTML($this->psignature);
	}
		
		//Paraqitet te raporti gjeneral, nuk varet nga sections
		$pdf->Ln(10);  
		$pdf->WriteHTML($this->doctorsignature);
		$pdf->WriteHTML($this->dsignature);
		
		// output
        $pdf->Output();

        // stop processing
        exit;
    }
}


/************************************/
/* class PDF                        */
/************************************/
class PDF extends FPDF
{
    protected $B;
    protected $I;
    protected $U;
    protected $HREF;
    protected $fontList;
    protected $issetfont;
    protected $issetcolor;

    var $ALIGN='';

    function __construct($orientation='P',$unit='mm',$format='A4',$_title,$_url,$_debug=false)
    {
        parent::__construct($orientation,$unit,$format);
        $this->B=0;
        $this->I=0;
        $this->U=0;
        $this->HREF='';
        $this->PRE='';
        $this->SetFont('Arial','',10);
        
        $this->fontlist=array('Times','Arial');
        $this->issetfont=false;
        $this->issetcolor=false;
        $this->articletitle=$_title;
        $this->articleurl=$_url;
        
        $this->debug=$_debug;
        $this->AliasNbPages();
    }

    function WriteHTML($html)
    {
        //remove all unsupported tags
        $html=str_replace("\n",' ',$html); //replace carriage returns with spaces
		$a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
        
        foreach($a as $i=>$e)
        {
            if($i%2==0)
                {
                   //Text
                    if($this-> ALIGN =='center')
                    	$this->Cell(0,5,$e,0,1,'C');
                    else
                      	$this->Write(6,$e);
                      
                } 
                else 
                {
                    //Tag
                   	if($e[0]=='/')
                        $this->CloseTag(strtoupper(substr($e,1)));
                    
                    else 
                    {
                        //Extract attributes
                        $a2=explode(' ',$e);
                        $tag=strtoupper(array_shift($a2));
                        $attr=array();
                        foreach($a2 as $v) {
                            if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                                $attr[strtoupper($a3[1])]=$a3[2];
                        }
                        $this->OpenTag($tag,$attr);
                    }
                }
        }
    }

    function OpenTag($tag,$attr)
    {
        //Opening tag
        if($tag == 'STRONG')
            {
            	$this->SetFontSize(16);
            	$this->ALIGN=$attr['ALIGN'];
            	$this->SetStyle('B',true);
            }
           
        if($tag == 'B')  
        	{
            	$this->SetFontSize(11);
            	$this->SetStyle($tag,true);
            }

        if($tag == 'EM')
        	{
        		$this->SetFontSize(10);
        		$this->SetStyle('I',true);
        	}
            
        if($tag== 'PRE')
            $this->SetFontSize(10);
                
        if($tag == 'I' || $tag == 'U')
			{
				$this->SetStyle($tag,true);
				$this->SetFontSize(9);
			}     
	}
    	
    function CloseTag($tag)
    {
        //Closing tag
       	if($tag == 'STRONG')
            {
            	$this->ALIGN='';
        		$this->SetStyle('B',false);
    		}
        
        if($tag == 'EM')
        {
        	$this->SetStyle('I',false);
        }

        if ($tag=='B' || $tag=='I')
			$this->SetStyle($tag,false);         
    } 
	
	function SetStyle($tag,$enable)
    {
		$this->$tag+=($enable ? 1 : -1);
        $style='';
        foreach(array('B','I','U') as $s) 
        {
            if($this->$s>0)
                $style.=$s;
        }
		
        $this->SetFont('',$style);
    }

    function PutLink($URL,$txt)
    {
        //Put a hyperlink
        $this->SetTextColor(0,0,255);
        $this->SetStyle('U',true);
        $this->Write(5,$txt,$URL);
        $this->SetStyle('U',false);
        $this->mySetTextColor(-1);
    }

    function PutLine()
    {
        $this->Ln(8);
        $this->Line($this->GetX(),$this->GetY(),$this->GetX()+198,$this->GetY());
        $this->Ln(3);
    }

    function mySetTextColor($r,$g=0,$b=0)
    {
        static $_r=0, $_g=0, $_b=0;

        if ($r==-1) 
            $this->SetTextColor($_r,$_g,$_b);
        else {
            $this->SetTextColor($r,$g,$b);
            $_r=$r;
            $_g=$g;
            $_b=$b;
        }
    }

    function Footer()
    {
    	$this->data=$_POST['date'];
    	$this->emriDok=$_POST['emriDok'];
    	$this->mbiemriDok=$_POST['mbiemriDok'];
    	$this->email=$_POST['emailDok'];
    	$this->nrtel=$_POST['nrtel'];

        //Go to 1.5 cm from bottom
        $this->SetY(-20);
        //Select Arial italic 8
        $this->SetFont('Times','',10);
        
        //Print centered page number
        $this->SetTextColor(0,0,0);
        //$this->Cell(0,4,'dfsdf',0,1,'C');
        $this->Cell(0,4,$this->data.', '.date("h:i:sa").', '.$this->emriDok.' '.$this->mbiemriDok,0,1,'C');

        
        //$this->SetTextColor(0,0,180);
        $this->Cell(0,4,'Prishtina International Airport,Vrelle,Lipjan,10070, '.$this->email.', '.$this->nrtel,0,0,'C',0);
        $this->mySetTextColor(-1);

        $this->Ln(4);
        $this->Cell(0,4,'Faqe (Page) '.$this->PageNo().'/{nb}',0,1,'C');
    }

    function Header()
    {
		$this->Image("limak_logo.png",10,7,80);
        //Select Arial bold 15
        $this->SetTextColor(0,0,0);
        $this->SetFont('Arial','',16);
        $this->Cell(0,10,$this->articletitle,0,0,'R');
		$this->Ln(6);
				
		$this->SetFont('Arial','',14);
        $this->Cell(0,10,$this->articleurl,0,0,'R');
        $this->Ln(7);
        $this->Line($this->GetX(),$this->GetY()+3,$this->GetX()+190,$this->GetY()+3);
        
        //Line break
        $this->Ln(5);
        //$this->SetFont('Times','',20);
        //$this->mySetTextColor(-1);
    }

    function SetDash($black=null,$white=null)
    {
    	if($black !== null)
    		$s = sprintf('[%.3F %.3F] 0 d',$black*$this->k,$white*$this->k);
    	else
    		$s = '[] 0 d';
    	$this-> _out($s);
    }
}// class PDF

?>
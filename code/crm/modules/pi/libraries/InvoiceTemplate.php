<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once FCPATH . "modules/pi/vendor/autoload.php";

use Fpdf\Fpdf;

class InvoiceTemplate extends Fpdf
{

    protected $orientation = 'P';

    protected $unit = "mm";

    protected $size = "Letter";

    protected $title = '';

    protected $subtitle = '';

    protected $filter = '';

    protected $totalRows = 0;
    
    protected $invoice_number = '';

    protected $client_name = '';

    protected $tax = ''; 

    
    protected $clientAddress = '';

    protected $clientState = '';

    protected $clientCountry = '';

    protected $invoice_id = '';

    protected $invoice_date = '';


    protected $subtotal = '';

    protected $total = '';

    protected $currency = '';

    public function __construct(
        $invoice_number, 
        $client_name,
        $tax,
        $clientAddress,
        $clientState, 
        $clientCountry, 
        $invoice_id, 
        $invoice_date, 
        $subtotal, 
        $total, 
        $currency)
    {
        $this->invoice_number = $invoice_number;
        $this->client_name = $client_name;
        $this->tax = $tax;
        $this->clientAddress = $clientAddress;
        $this->clientState = $clientState;
        $this->clientCountry = $clientCountry;
        $this->invoice_id = $invoice_id;
        $this->invoice_date = $invoice_date;
        $this->subtotal = $subtotal;
        $this->total = $total;
        $this->currency = $currency;
        $this->SetMargins(40,40,20);
        parent::__construct($this->orientation, $this->unit, $this->size);
    }


    public function header()
    {
       
        //Logo y Nº de Factura
        $this->Cell(55);
        $this->Image(FCPATH."uploads/company/ECV_LOGO.jpg", 15, 15, 40, 20, 'jpg');
        $this->Cell(140,10,"RUC: {$this->invoice_number}",0,0,'R');
        $this->Ln(4);
        //Oficinas
        $this->Cell(70);
        $this->Cell(140,10,"OFICINA CARACAS",0,0,'L');
        $this->Ln(4);
        //Direccion
        $this->Cell(70);
        $this->Cell(140,10,"Calle La Iglesia, Edificio Centro Solano Plaza 1, Piso 4, Ofic. 4-A, Sabana Grande, Caracas",0,0,'L');
        $this->Ln(4);
        $this->Cell(70);
        $this->Cell(140,10,"1050, República Bolivariana de Venezuela",0,0,'L');
        $this->Ln(6);
        //Oficinas
        $this->Cell(70);
        $this->Cell(140,10,"OFICINA PANAMA",0,0,'L');
        $this->Ln(4);
        //Direccion
        $this->Cell(70);
        $this->Cell(140,10,"Calle 50, Edificio Global Plaza, Piso 6, Ciudad de Panamá, Panamá",0,0,'L');
        $this->Ln(6);
        //Info
        $this->Cell(70);
        $this->Cell(140,10,"info@ecv.com.ve - www.ecv.com.ve",0,0,'L');
        $this->Ln(10);
        //Factura
        $numberInvoice = str_pad($this->invoice_id,6, '0', STR_PAD_LEFT);
        $this->SetFontSize(11);
        $this->Cell(195,10,"Factura Nro: {$numberInvoice}",0,0,'R');
        $this->Ln(6);
        $this->SetFontSize(11);
        $invoice_date = date('d/m/Y',strtotime($this->invoice_date));
        $this->Cell(195,10,"Fecha: {$invoice_date}",0,0,'R');
        $this->Ln(1);
        //Client NAME
        $this->SetFontSize(10);
        $this->Cell(70,15,"{$this->client_name}",0,0,'L');
        $this->Ln(5);
        $this->SetFontSize(8);
        $tax = 
        $this->Cell(70,15,"Tax ID / VAT: {$this->tax}",0,0,'L');
        $this->Ln(5);
        $this->Cell(70,15,"{$this->clientAddress}",0,0,'L');
        $this->Ln(5);
        $this->SetFontSize(8);
        $this->Cell(70,15,"{$this->clientState}",0,0,'L');
        $this->Ln(5);
        $this->SetFontSize(8);
        $this->Cell(70,15,"{$this->clientCountry}",0,0,'L');
        
        //Direccion Cliente
      //  $this->SetFontSize(10);
       // $this->Cell(70,10,"{$this->clientAddress}",0,0,'L');
        $this->Ln(13);
    }

    public function table($items)
    {
        $this->AddPage();
        $this->Cell(50,10,'CANT.', 'B');
        $this->Cell(75, 10, "CONCEPTO", 'B');
        $this->Cell(50, 10, "SUBTOTAL {$this->currency}", 'B');
        $this->Ln(6);
        $w = array(50,75,50);
        /*Parseamos la tabla*/
        $fill = false;
        foreach ($items as $key => $value) {
            $this->Cell($w[0], 10, "{$value['qty']}", '', '', "C");
            $this->Cell($w[1], 10, "{$value['description']}", "", '', "L");
            $this->Cell($w[2], 5, "{$value['rate']}", "", '', "C");
            $this->Ln(10);
            $fill = !$fill;
        }
        $this->Cell(105, 10, "SUBTOTAL  {$this->currency}: ", '', '', 'L');
        //$this->Cell(50, 10, "{$this->subtotal}: ", '', '', 'L');
        $this->Ln(10);
        $this->Cell(105, 10, "TOTAL  {$this->currency}: ", '', '', 'L');
        //$this->Cell(50, 10, "{$this->total}: ", '', '', 'L');
        $this->Ln(10);

    }


    public function Footer()
    {
        $this->SetY(-90);
        //Formas de Pago
        $this->Cell(70,10,"FORMAS DE PAGO",0,0,'L');
        $this->Ln(4);
        //CHEQUE
        $this->Cell(70,10,"- CHEQUE",0,0,'L');
        $this->Ln(4);
        $this->Cell(70,10,"E.C.V & ASOCIADOS",0,0,'L');
        $this->Ln(4);
        $this->Cell(70,10,"Envío por Courier a nuestra dirección",0,0,'L');
        $this->Ln(6);
        //TRANSFERENCIA
        $this->Cell(70,10,"-TRANSFERENCIA",0,0,'L');
        $this->Ln(4);
        $this->Cell(70,10,"Banesco USA",0,0,'L');
        $this->Ln(4);
        $this->Cell(70,10,"150 Alhambra Circle, Suite 100",0,0,'L');
        $this->Ln(4);
        $this->Cell(70,10,"Coral Gables, FL, 33134",0,0,'L');
        $this->Ln(4);
        $this->Cell(70,10,"ABA: 067015779",0,0,'L');
        $this->Ln(4);
        $this->Cell(70,10,"SWIFT: BBUBUS33XXX",0,0,'L');
        $this->Ln(4);
        $this->Cell(70,10,"Account Number: 1500094428",0,0,'L');
        $this->Ln(4);
        $this->Cell(70,10,"I/n/o: E.C.V & ASOCIADOS",0,0,'L');
        $this->Ln(4);
    }

    public function SetFilter($filter)
    {
        return $this->filter = $filter;
    }

    public function SetOrientation($orientation)
    {
        return $this->orientation = $orientation;
    }

    public function SetUnit($unit)
    {
        return $this->unit = $unit;
    }

    public function SetSize($size)
    {
        return $this->size = $size;
    }

    public function SetTotalRows($totalRows)
    {
        return $this->totalRows = $totalRows;
    }
}

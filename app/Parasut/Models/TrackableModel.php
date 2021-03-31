<?php


namespace App\Parasut\Models;


use App\Models\all_invoice_request;

class TrackableModel
{
    protected string $id;
    protected string $invoiceType;
    protected string $invoiceId;
    protected all_invoice_request $request;

    /**
     * TrackableModel constructor.
     * @param $id
     * @param $invoiceType
     * @param $invoiceId
     * @param all_invoice_request $request
     */
    public function __construct($id, $invoiceType, $invoiceId, all_invoice_request $request)
    {
        $this->id = $id;
        $this->invoiceType = $invoiceType;
        $this->invoiceId = $invoiceId;
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getInvoiceType()
    {
        return $this->invoiceType;
    }

    /**
     * @return string
     */
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    /**
     * @return all_invoice_request
     */
    public function getRequest()
    {
        return $this->request;
    }

}

<?php


namespace App\Parasut\Models;


use App\Models\allInvoiceRequest;
use App\Models\invoicerecords;


class TrackableModel
{
    protected string $id;
    protected string $invoiceType;
    protected string $invoiceId;
    protected invoicerecords $invoicerecords;

    /**
     * TrackableModel constructor.
     * @param $id
     * @param $invoiceType
     * @param $invoiceId
     * @param invoicerecords $invoicerecords
     */
    public function __construct($id, $invoiceType, $invoiceId,$invoicerecords)
    {
        $this->id = $id;
        $this->invoiceType = $invoiceType;
        $this->invoiceId = $invoiceId;
        $this->request = $invoicerecords;
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
     * @return invoicerecords
     */
    public function getRequest()
    {
        return $this->request;
    }

}

<?php


namespace App\Parasut\Models;


use App\Models\Request;

class TrackableModel
{
    protected string $id;
    protected string $invoiceType;
    protected string $invoiceId;
    protected Request $request;

    /**
     * TrackableModel constructor.
     * @param $id
     * @param $invoiceType
     * @param $invoiceId
     * @param Request $request
     */
    public function __construct($id, $invoiceType, $invoiceId, Request $request)
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
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

}

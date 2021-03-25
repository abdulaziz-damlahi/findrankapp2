<?php

namespace App\Parasut\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static Contacts()
 * @method static SalesInvoices()
 * @method static EInvoiceInboxes()
 * @method static EInvoices()
 * @method static EArchives()
 * @method static TrackableJobs()
 */
final class ParasutEndPoint extends Enum
{
    const Contacts = "contacts";
    const SalesInvoices = "sales_invoices";
    const EInvoiceInboxes = "e_invoice_inboxes";
    const EInvoices = "e_invoices";
    const EArchives = "e_archives";
    const TrackableJobs = "trackable_jobs";
}

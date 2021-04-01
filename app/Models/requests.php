<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;


/**
 * App\Models\Request
 *
 * @property int $id
 * @property integer|null $customer_id
 * @property integer|null $packet_id
 * @property integer|null $invoice_record
 * @property string $paymnet_id
 * @property string $invoice_id
 * @property string $parasut_customer_id
 * @property string $user_id
 * @method static where(string $string, $exceptId)
 * @method static select(array $array)
 * @method static whereNotIn(string $string, array $ids)
 * @method static whereNull(string $string)
 * @method static whereNotNull(string $string)
 * @method static Builder|Request whereId($value)
 * @method static Builder|Request whereCustomerId($value)
 * @method static Builder|Request whereServiceProviderId($value)
 * @method static Builder|Request whereInvoiceRecordId($value)
 * @method static Builder|Request whereType($value)
 * @method static Builder|Request whereRequestDate($value)
 * @method static Builder|Request whereDistance($value)
 * @method static Builder|Request whereStatus($value)
 * @method static Builder|Request whereDescription($value)
 * @method static Builder|Request whereCreatedAt($value)
 * @method static Builder|Request whereUpdatedAt($value)
 * @method static Builder|Request whereDeletedAt($value)
 * @method static Builder|Request newModelQuery()
 * @method static Builder|Request newQuery()
 * @method static Builder|Request query()
 * @method static find($requestId)
 */
class requests extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'customer_id',
        'packet_id',
        'invoice_record',
        'paymnet_id',
        'invoice_id',
        'parasut_customer_id',
        'user_id',
    ];
    public function packets()
    {
        return $this->belongsTo('App\Models\packets', 'id','id');
    }
    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
    public function invoicerecords(): BelongsTo
    {
        return $this->belongsTo(InvoiceRecord::class, 'invoice_record_id');
    }
}

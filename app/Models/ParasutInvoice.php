<?php

namespace App\Models;

use App\Parasut\Enums\ParasutInvoiceStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Carbon;

/**
 * App\Models\ParasutInvoice
 *
 * @property int $id
 * @property int $invoice_id
 * @property ParasutInvoiceStatus $status
 * @property string|null $sharing_preview_url
 * @property string|null $messages
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $invoice_type
 * @property-read float total
 * @method static select(Expression $raw)
 * @method static whereIn(string $string, int[] $array)
 * @method static create(array $array)
 * @method static Builder|ParasutInvoice newModelQuery()
 * @method static Builder|ParasutInvoice newQuery()
 * @method static Builder|ParasutInvoice query()
 * @method static Builder|ParasutInvoice whereCreatedAt($value)
 * @method static Builder|ParasutInvoice whereId($value)
 * @method static Builder|ParasutInvoice whereInvoiceId($value)
 * @method static Builder|ParasutInvoice whereInvoiceType($value)
 * @method static Builder|ParasutInvoice whereMessages($value)
 * @method static Builder|ParasutInvoice whereSharingPreviewUrl($value)
 * @method static Builder|ParasutInvoice whereStatus($value)
 * @method static Builder|ParasutInvoice whereUpdatedAt($value)
 */
class ParasutInvoice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'charge_id',
        'invoice_id',
        'status',
        'messages',
        'invoice_type'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'charge_id' => 'integer',
        'invoice_id' => 'integer',
        'status' => ParasutInvoiceStatus::class,
        'messages' => 'string',
        'invoice_type' => 'string'
    ];

}

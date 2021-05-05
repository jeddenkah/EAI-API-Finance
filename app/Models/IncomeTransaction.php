<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IncomeTransaction
 * 
 * @property int $id
 * @property int|null $penjualan_id
 * @property string $payment_method
 * @property float $nominal
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class IncomeTransaction extends Model
{
	protected $table = 'income_transactions';

	protected $casts = [
		'penjualan_id' => 'int',
		'nominal' => 'float'
	];

	protected $fillable = [
		'penjualan_id',
		'payment_method',
		'nominal',
		'status'
	];
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OutcomeTransaction
 * 
 * @property int $id
 * @property string $type
 * @property string $name
 * @property int|null $funding_id
 * @property int|null $fixed_cost_id
 * @property string $payment_method
 * @property float $nominal
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property FixedCost|null $fixed_cost
 * @property Funding|null $funding
 *
 * @package App\Models
 */
class OutcomeTransaction extends Model
{
	protected $table = 'outcome_transactions';

	protected $casts = [
		'funding_id' => 'int',
		'fixed_cost_id' => 'int',
		'nominal' => 'float'
	];

	protected $fillable = [
		'type',
		'name',
		'funding_id',
		'fixed_cost_id',
		'payment_method',
		'nominal',
		'status'
	];

	public function fixed_cost()
	{
		return $this->belongsTo(FixedCost::class);
	}

	public function funding()
	{
		return $this->belongsTo(Funding::class);
	}
}

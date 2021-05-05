<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FixedCost
 * 
 * @property int $id
 * @property int $divisi_id
 * @property string $name
 * @property string $description
 * @property string $status
 * @property float $nominal
 * @property string $every
 * @property Carbon $date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|OutcomeTransaction[] $outcome_transactions
 *
 * @package App\Models
 */
class FixedCost extends Model
{
	protected $table = 'fixed_costs';

	protected $casts = [
		'divisi_id' => 'int',
		'nominal' => 'float'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'divisi_id',
		'name',
		'description',
		'status',
		'nominal',
		'every',
		'date'
	];

	public function outcome_transactions()
	{
		return $this->hasMany(OutcomeTransaction::class);
	}
}

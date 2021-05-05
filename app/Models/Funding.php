<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Funding
 * 
 * @property int $id
 * @property int $divisi_id
 * @property string $title
 * @property string|null $description
 * @property float $nominal
 * @property string $status
 * @property string|null $attachment
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|OutcomeTransaction[] $outcome_transactions
 *
 * @package App\Models
 */
class Funding extends Model
{
	protected $table = 'fundings';

	protected $casts = [
		'divisi_id' => 'int',
		'nominal' => 'float'
	];

	protected $fillable = [
		'divisi_id',
		'title',
		'description',
		'nominal',
		'status',
		'attachment'
	];

	public function outcome_transactions()
	{
		return $this->hasMany(OutcomeTransaction::class);
	}
}

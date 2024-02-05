<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Platform;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Application extends Model
{
  use HasFactory;
  use HasUuids;
  use SoftDeletes;

  protected $fillable = [
    'name',
    'description',
    'person_in_charge',
    'developer',
    'url',
    'organization_id',
    'platform_id',
    'user_id',
  ];

  protected $casts = [
    'person_in_charge' => 'array',
    'developer' => 'array',
  ];

  public function organization(): BelongsTo
  {
    return $this->belongsTo(Organization::class);
  }

  public function platform(): BelongsTo
  {
    return $this->belongsTo(Platform::class);
  }

  public function categories(): BelongsToMany
  {
    return $this->belongsToMany(Category::class);
  }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    'category_id',
    'organization_id',
    'platform_id',
    'user_id',
  ];

  protected $casts = [
    'person_in_charge' => 'array',
    'developer' => 'array',
  ];
}

<?php

namespace App\Models;

use App\Models\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
  use SoftDeletes;
  use HasFactory;

  protected $fillable = [
    'name'
  ];

  public function applications(): BelongsToMany
  {
    return $this->belongsToMany(Application::class);
  }
}

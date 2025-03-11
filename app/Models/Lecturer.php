<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lecturer extends Model
{
  protected $table = 'lecturer';

  protected $fillable = ['nik', 'name', 'email', 'birth_date'];

  protected $primaryKey = 'nik';

  protected $keyType = 'string';

  public $incrementing = false;

  public function students(): HasMany
  {
    return $this->hasMany(Student::class, 'lecturer_nik');
  }
}

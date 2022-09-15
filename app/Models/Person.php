<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Storage;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'birth_date',
        'death_date',
        'biography'
    ];

    protected $casts = [
        'birth_date' => 'date',
        'death_date' => 'date',
    ];

    public static function boot()
    {
        parent::boot();

        self::updated(function (Person $person) {
            if ($person->isDirty('photo')) {
                Storage::delete($person->getOriginal('photo'));
            }
        });

        self::deleted(function (Person $person) {
            if ($person->isDirty('photo')) {
                Storage::delete($person->getOriginal('photo'));
            }
        });
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('relation_type');
    }

    public function getPhotoUrlAttribute(): ?string
    {
        return $this->photo ? Storage::url($this->photo) : null;
    }
}

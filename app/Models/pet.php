<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'image',
        'kind',
        'weight',
        'age',
        'breed',
        'location',
        'description',
        'active',
        'status',
    ];

    // relationships 
    // pet hasOne adoption 

    public function adoption()
    {
        return $this->hasOne(Adoption::class);
    }

    public function scopeNames($query, $q)
    {
        if (trim($q)) {
            return $query->where('name', 'LIKE', "%$q%")
                ->orWhere('kind', 'LIKE', "%$q%");
        }
    }

public function scopeKinds($query, $q)
    {
        // Si no hay búsqueda, solo trae los que tienen status = 0
        if (!trim($q)) {
            return $query->where('status', 0);
        }

        // Si sí hay búsqueda
        return $query->where(function ($q2) use ($q) {
            $q2->where('name', 'LIKE', "%$q%")
                ->orWhere('kind', 'LIKE', "%$q%");
        })
            ->where('status', 0);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Tenant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'tenant_id',
        'concourse_id',
        'space_id',
        'owner_id',
        'lease_start',
        'lease_end',
        'lease_term',
        'lease_status',
        'bills',
        'monthly_payment',
        'is_active',
    ];

    protected $casts = [
        'bills' => 'array',
        'lease_start' => 'date',
        'lease_end' => 'date',
        'is_active' => 'boolean',
    ];

    public function tenant()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }

    public function concourse()
    {
        return $this->belongsTo(Concourse::class);
    }

    public function space()
    {
        return $this->belongsTo(Space::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}

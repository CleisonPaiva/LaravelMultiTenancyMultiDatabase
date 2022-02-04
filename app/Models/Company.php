<?php

namespace App\Models;

use Database\Factories\CompaniesFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\TenantCompanyFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subdomain',
        'db_database',
        'db_hostname',
        'db_username',
        'db_password'
    ];


    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return CompaniesFactory::new();
    }
}


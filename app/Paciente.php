<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Paciente extends Model
{
    use SoftDeletes;

    public $table = 'pacientes';

    const SEXO_RADIO = [
        'H' => 'H',
        'M' => 'M',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nombres',
        'apellidos',
        'email',
        'telefono',
        'sexo',
        'padecimiento',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

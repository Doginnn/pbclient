<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $primaryKey = 'nu_seq_client';

    protected $fillable = [
        'nu_seq_client',
        'ds_nome',
        'ds_nome_social',
        'nu_cpf_cnpj',
        'dt_nascimento',
        'ds_foto_path'
    ];
}

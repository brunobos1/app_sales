<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;

    protected $fillable = ['year', 'value'];

    public function rules(){
        return [
            'year' => 'required|unique:productions,year,'.$this->id.'|numeric|min:2021|max:'.(int)date("Y"),
            'value' => 'required|numeric'
        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é obrigatório',
            'numeric' => 'O campo :attribute só pode conter números',
            'year.unique' => 'A produção deste ano já foi cadastrada.',
            'year.min' => 'Não é possivel alterar o registro de anos anteriores a 2021',
            'year.max' => 'Não é possivel alterar o registro de anos que ainda não existem'
        ];
    }
}

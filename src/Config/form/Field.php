<?php

namespace App\Config\form;

use App\Config\Model;


class Field
{
    public Model $model;
    public string $attribute;

    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        return sprintf(
            '
        <div class="form-group">
            <input class="form-control %s" placeholder="%s" name="%s" value="%s" type="text">
            <p style="font-size:10px; color:red" align="center">
                %s
            </p>
        </div>',
            $this->model->hasError($this->attribute) ? 'is-invalid' : '',
            $this->attribute,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->getFirstError($this->attribute)

        );
    }
}

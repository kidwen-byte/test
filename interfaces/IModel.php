<?php

namespace app\interfaces;

interface IModel
{
    public function filter($value);
    public function getChar($id);
    public function getProduct($id);
    public function getAll();
}
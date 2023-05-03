<?php

namespace App\Controllers;

class Questionnaire extends BaseController
{
    public function getIndex()
    {
        return view("admin/questionnaire/index");
    }
}

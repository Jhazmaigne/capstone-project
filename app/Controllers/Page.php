<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function getIndex()
    {
        return view('admin/personnel/index');
    }

    public function getGago($sample = "GHAHAHA")
    {
        return $sample;
    }

    public function view($page = "home", $sample = "data")
    {
        echo $page;
        echo "<br>";
        echo $sample;
        // if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
        //     // Whoops, we don't have a page for that!
        //     throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        // }

        // $data['title'] = ucfirst($page); // Capitalize the first letter
        // return view('templates/header', $data)
        //     . view('pages/' . $page)
        //     . view('templates/footer');
    }
}

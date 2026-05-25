<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\BannerDataTable;

class BannersController extends Controller
{
    public function index(BannerDataTable $datatable)
    {
        //here we get the dashboard page of managing Banners in datatable
        return $datatable->render('dashboard.banners.index');
    }
    public function store(Request $request)
    {
        //here we create a new Banner record
        $validated = $request->validate([
''
        ]);
    }
    public function edit()
    {
        //here we return a specific banner record
    }
    public function update()
    {
        //here we update a specific banner record
    }
    public function destroy()
    {
        //here we delete a banner record
    }
}

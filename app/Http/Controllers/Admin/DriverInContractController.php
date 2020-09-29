<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MenuSystem;
use App\Driver;
use App\Helper;
use App\NamePrefix;
use App\RecruitmentPosition;
use App\Gender;
use App\Provinces;
use App\JobQuestion;
use App\LanguageType;
use App\TypeDocumentDriver;
use App\TypeJobNew;
use App\BankType;
use App\WorkingEquipment;

class DriverInContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'DriverInContract')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['RecruitmentPositions'] = RecruitmentPosition::where('recruitment_position_status', 1)->get();
        $data['Genders'] = Gender::where('gender_status', 1)->get();
        $data['NamePrefixs'] = NamePrefix::where('name_prefix_status', 1)->get();
        $data['Provinces'] = Provinces::where('provinces_status', 1)->get();
        $data['JobQuestions'] = JobQuestion::where('job_question_status', 1)->orderBy('job_question_z_index')->get();
        $data['LanguageTypes'] = LanguageType::where('language_type_status', 1)->get();
        $data['TypeDocumentDrivers'] = TypeDocumentDriver::where('type_doc_driver_status', 1)->get();
        $data['TypeJobNews'] = TypeJobNew::where('type_job_new_status', 1)->get();
        $data['BankTypes'] = BankType::where('driver_bank_type_status', 1)->get();
        $data['WorkingEquipments'] = WorkingEquipment::where('working_equipment_status', 1)->get();
        $data['PageContract'] = 'D';

        if (Helper::CheckPermissionMenu('DriverInContract', '1')) {
            return view('admin.DriverInContract.driver_in_contract', $data);
        } else {
            return redirect('admin/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php
Route::get('/login', 'Admin\AuthController@login')->name('login');
Route::get('/Logout', 'Admin\AuthController@Logout');
Route::post('/CheckLogin', 'Admin\AuthController@checkLogin');

Route::middleware('authAdmin:admin')->group(function () {
    Route::get('/', 'Admin\DashboardController@index');
    Route::get('/Dashboard', 'Admin\DashboardController@index');

    // get Holiday
    Route::get('GetHoliday/{mouth}', 'Admin\DashboardController@GetHoliday');

    //get Province, Amphur, zipcode
    Route::get('GetProvinceByGeography/{geo_id}', 'Admin\DashboardController@GetProvinceByGeography');
    Route::get('GetAmphurByProvince/{provinces_id}', 'Admin\DashboardController@GetAmphurByProvince');
    Route::get('GetDistrictByAmphur/{amphur_id}', 'Admin\DashboardController@GetDistrictByAmphur');
    Route::get('GetZipcodeByDistrict/{districts_code}', 'Admin\DashboardController@GetZipcodeByDistrict');
    Route::get('GetCustomerByCompany/{company_id}', 'Admin\DashboardController@GetCustomerByCompany');
    Route::get('GetQuotationPriceListByGroupQuotation/{quotation_id}', 'Admin\DashboardController@GetQuotationPriceListByGroupQuotation');
    Route::get('GetQuotationPriceListByGroupQuotation/{quotation_id}', 'Admin\DashboardController@GetQuotationPriceListByGroupQuotation');

    Route::post('UploadFile/{folder}', 'Admin\UploadFileController@UploadFile');

    Route::post('/NamePrefix/Lists', 'Admin\NamePrefixController@lists');
    Route::resource('NamePrefix', 'Admin\NamePrefixController');
    Route::post('/NamePrefix/ChangeStatus/{id}', 'Admin\NamePrefixController@ChangeStatus');

    Route::post('/Department/Lists', 'Admin\DepartmentController@lists');
    Route::resource('Department', 'Admin\DepartmentController');
    Route::post('/Department/ChangeStatus/{id}', 'Admin\DepartmentController@ChangeStatus');
    Route::post('/Department/SetPremission/{id}', 'Admin\DepartmentController@SetPremission');

    Route::post('/GroupLevel/Lists', 'Admin\GroupLevelController@lists');
    Route::resource('GroupLevel', 'Admin\GroupLevelController');
    Route::post('/GroupLevel/ChangeStatus/{id}', 'Admin\GroupLevelController@ChangeStatus');

    Route::post('/Position/Lists', 'Admin\PositionController@lists');
    Route::resource('Position', 'Admin\PositionController');
    Route::post('/Position/ChangeStatus/{id}', 'Admin\PositionController@ChangeStatus');

    Route::post('/AdminUser/Lists', 'Admin\AdminUserController@lists');
    Route::resource('AdminUser', 'Admin\AdminUserController');
    Route::post('/AdminUser/ChangeStatus/{id}', 'Admin\AdminUserController@ChangeStatus');
    Route::post('/AdminUser/SetPremission/{id}', 'Admin\AdminUserController@SetPremission');
    Route::post('/AdminUser/ResetPassword/{id}', 'Admin\AdminUserController@ResetPassword');

    Route::post('/RecruitmentPosition/Lists', 'Admin\RecruitmentPositionController@lists');
    Route::resource('RecruitmentPosition', 'Admin\RecruitmentPositionController');
    Route::post('/RecruitmentPosition/ChangeStatus/{id}', 'Admin\RecruitmentPositionController@ChangeStatus');

    Route::post('/TypeDocument/Lists', 'Admin\TypeDocumentController@lists');
    Route::resource('TypeDocument', 'Admin\TypeDocumentController');
    Route::post('/TypeDocument/ChangeStatus/{id}', 'Admin\TypeDocumentController@ChangeStatus');

    Route::post('/JobQuestion/Lists', 'Admin\JobQuestionController@lists');
    Route::resource('JobQuestion', 'Admin\JobQuestionController');
    Route::post('/JobQuestion/ChangeStatus/{id}', 'Admin\JobQuestionController@ChangeStatus');

    Route::post('/TypeDocumentDriver/Lists', 'Admin\TypeDocumentDriverController@lists');
    Route::resource('TypeDocumentDriver', 'Admin\TypeDocumentDriverController');
    Route::post('/TypeDocumentDriver/ChangeStatus/{id}', 'Admin\TypeDocumentDriverController@ChangeStatus');

    Route::post('/CriminalType/Lists', 'Admin\CriminalTypeController@lists');
    Route::resource('CriminalType', 'Admin\CriminalTypeController');
    Route::post('/CriminalType/ChangeStatus/{id}', 'Admin\CriminalTypeController@ChangeStatus');

    Route::post('/HealthType/Lists', 'Admin\HealthTypeController@lists');
    Route::resource('HealthType', 'Admin\HealthTypeController');
    Route::post('/HealthType/ChangeStatus/{id}', 'Admin\HealthTypeController@ChangeStatus');

    Route::post('/StaffCost/Lists', 'Admin\StaffCostController@lists');
    Route::resource('StaffCost', 'Admin\StaffCostController');
    Route::post('/StaffCost/ChangeStatus/{id}', 'Admin\StaffCostController@ChangeStatus');

    Route::post('/OtherExpenses/Lists', 'Admin\OtherExpensesController@lists');
    Route::resource('OtherExpenses', 'Admin\OtherExpensesController');
    Route::post('/OtherExpenses/ChangeStatus/{id}', 'Admin\OtherExpensesController@ChangeStatus');

    Route::post('/InsuranceFee/Lists', 'Admin\InsuranceFeeController@lists');
    Route::resource('InsuranceFee', 'Admin\InsuranceFeeController');
    Route::post('/InsuranceFee/ChangeStatus/{id}', 'Admin\InsuranceFeeController@ChangeStatus');

    Route::post('/Geography/Lists', 'Admin\GeographyController@lists');
    Route::resource('Geography', 'Admin\GeographyController');
    Route::post('/Geography/ChangeStatus/{id}', 'Admin\GeographyController@ChangeStatus');
    Route::get('Geography/getProvinces_table/{id}', 'Admin\GeographyController@getProvinces_table');
    Route::get('Geography/getAmphures_table/{id}', 'Admin\GeographyController@getAmphures_table');
    Route::get('Geography/getDistricts_table/{id}', 'Admin\GeographyController@getDistricts_table');

    Route::post('/Provinces/Lists', 'Admin\ProvincesController@lists');
    Route::resource('Provinces', 'Admin\ProvincesController');
    Route::post('/Provinces/ChangeStatus/{id}', 'Admin\ProvincesController@ChangeStatus');
    Route::get('Provinces/getAmphures_table/{id}', 'Admin\ProvincesController@getAmphures_table');
    Route::get('Provinces/getDistricts_table/{id}', 'Admin\ProvincesController@getDistricts_table');

    Route::post('/Amphures/Lists', 'Admin\AmphuresController@lists');
    Route::resource('Amphures', 'Admin\AmphuresController');
    Route::post('/Amphures/ChangeStatus/{id}', 'Admin\AmphuresController@ChangeStatus');
    Route::get('Amphures/getDistricts_table/{id}', 'Admin\AmphuresController@getDistricts_table');

    Route::post('/Districts/Lists', 'Admin\DistrictsController@lists');
    Route::resource('Districts', 'Admin\DistrictsController');
    Route::post('/Districts/ChangeStatus/{id}', 'Admin\DistrictsController@ChangeStatus');

    Route::post('/RunCode/Lists', 'Admin\RunCodeController@lists');
    Route::resource('RunCode', 'Admin\RunCodeController');
    Route::post('/RunCode/ChangeStatus/{id}', 'Admin\RunCodeController@ChangeStatus');

    Route::post('/HeadDocuments/Lists', 'Admin\HeadDocumentsController@lists');
    Route::resource('HeadDocuments', 'Admin\HeadDocumentsController');
    Route::post('/HeadDocuments/ChangeStatus/{id}', 'Admin\HeadDocumentsController@ChangeStatus');

    Route::post('/BankType/Lists', 'Admin\BankTypeController@lists');
    Route::resource('BankType', 'Admin\BankTypeController');
    Route::post('/BankType/ChangeStatus/{id}', 'Admin\BankTypeController@ChangeStatus');

    Route::post('/WorkingEquipment/Lists', 'Admin\WorkingEquipmentController@lists');
    Route::resource('WorkingEquipment', 'Admin\WorkingEquipmentController');
    Route::post('/WorkingEquipment/ChangeStatus/{id}', 'Admin\WorkingEquipmentController@ChangeStatus');

    Route::post('/PriceStructureOT/Lists', 'Admin\PriceStructureOTController@lists');
    Route::resource('PriceStructureOT', 'Admin\PriceStructureOTController');
    Route::post('/PriceStructureOT/ChangeStatus/{id}', 'Admin\PriceStructureOTController@ChangeStatus');

    Route::post('/ResignType/Lists', 'Admin\ResignTypeController@lists');
    Route::resource('ResignType', 'Admin\ResignTypeController');
    Route::post('/ResignType/ChangeStatus/{id}', 'Admin\ResignTypeController@ChangeStatus');

    Route::post('/LeaveType/Lists', 'Admin\LeaveTypeController@lists');
    Route::resource('LeaveType', 'Admin\LeaveTypeController');
    Route::post('/LeaveType/ChangeStatus/{id}', 'Admin\LeaveTypeController@ChangeStatus');

    Route::post('/CustomerType/Lists', 'Admin\CustomerTypeController@lists');
    Route::resource('CustomerType', 'Admin\CustomerTypeController');
    Route::post('/CustomerType/ChangeStatus/{id}', 'Admin\CustomerTypeController@ChangeStatus');

    Route::post('/LanguageType/Lists', 'Admin\LanguageTypeController@lists');
    Route::resource('LanguageType', 'Admin\LanguageTypeController');
    Route::post('/LanguageType/ChangeStatus/{id}', 'Admin\LanguageTypeController@ChangeStatus');

    Route::post('/JobRegister/Lists', 'Admin\JobRegisterController@lists');
    Route::resource('JobRegister', 'Admin\JobRegisterController');
    Route::post('/JobRegister/CheckDriverIDCard/{id}', 'Admin\JobRegisterController@CheckDriverIDCard');
    Route::post('/JobRegister/SetInterviewDate/{id}', 'Admin\JobRegisterController@SetInterviewDate');
    Route::get('/JobRegister/PrintDriverProfile/{id}', 'Admin\JobRegisterController@PrintDriverProfile');
    Route::get('/JobRegister/PrintDriverProfileFull/{id}', 'Admin\JobRegisterController@PrintDriverProfileFull');
    Route::get('/JobRegister/PrintDriverProfileContract/{id}', 'Admin\JobRegisterController@PrintDriverProfileContract');

    Route::post('/TypeJobNew/Lists', 'Admin\TypeJobNewController@lists');
    Route::resource('TypeJobNew', 'Admin\TypeJobNewController');
    Route::post('/TypeJobNew/ChangeStatus/{id}', 'Admin\TypeJobNewController@ChangeStatus');

    Route::post('/SaleManager/Lists', 'Admin\SaleManagerController@lists');
    Route::resource('SaleManager', 'Admin\SaleManagerController');
    Route::post('/SaleManager/ChangeStatus/{id}', 'Admin\SaleManagerController@ChangeStatus');
    Route::post('/SaleManager/ChangeStatusSale/{id}', 'Admin\SaleManagerController@ChangeStatusSale');
    Route::post('/SaleManager/ChangeStatusArea/{id}', 'Admin\SaleManagerController@ChangeStatusArea');
    Route::post('/ManagerLists/Lists', 'Admin\ManagerListsController@Lists');

    Route::post('/SaleArea/Lists', 'Admin\SaleAreaController@lists');
    Route::resource('SaleArea', 'Admin\SaleAreaController');
    Route::post('/SaleArea/ChangeStatus/{id}', 'Admin\SaleAreaController@ChangeStatus');
    Route::post('/SaleArea/ChangeStatusSale/{id}', 'Admin\SaleAreaController@ChangeStatusSale');
    Route::get('/SaleArea/GetManager/{id}', 'Admin\SaleAreaController@GetManager');
    Route::get('/SaleArea/GetAddUser/{id}', 'Admin\SaleAreaController@GetAddUser');
    Route::get('/SaleArea/AddUser/{id}', 'Admin\SaleAreaController@AddUser');
    Route::post('/SaleUserLists/Lists', 'Admin\SaleUserListsController@Lists');

    Route::post('/SaleUser/Lists', 'Admin\SaleUserController@lists');
    Route::resource('SaleUser', 'Admin\SaleUserController');
    Route::post('/SaleUser/ChangeStatusSale/{id}', 'Admin\SaleUserController@ChangeStatusSale');
    Route::post('/SaleUser/ChangeStatusAllSale/{id}', 'Admin\SaleUserController@ChangeStatusAllSale');
    Route::get('/SaleUser/GetArea/{id}', 'Admin\SaleUserController@GetArea');
    Route::get('/SaleUser/GetUserNotSale/{id}', 'Admin\SaleUserController@GetUserNotSale');
    Route::post('/UserSaleTeam/Lists', 'Admin\UserSaleTeamController@Lists');

    Route::post('/DriverFile/Lists', 'Admin\DriverFileController@lists');
    Route::resource('DriverFile', 'Admin\DriverFileController');
    Route::post('/DriverFile/ChangeStatus/{id}', 'Admin\DriverFileController@ChangeStatus');

    Route::post('/PeopleGuarantee/Lists', 'Admin\PeopleGuaranteeController@lists');
    Route::resource('PeopleGuarantee', 'Admin\PeopleGuaranteeController');
    Route::post('/PeopleGuarantee/ChangeStatus/{id}', 'Admin\PeopleGuaranteeController@ChangeStatus');

    Route::post('/PeopleGuaranteeFile/Lists', 'Admin\PeopleGuaranteeFileController@lists');
    Route::resource('PeopleGuaranteeFile', 'Admin\PeopleGuaranteeFileController');
    Route::post('/PeopleGuaranteeFile/ChangeStatus/{id}', 'Admin\PeopleGuaranteeFileController@ChangeStatus');

    Route::post('/DriverPersonality/Lists', 'Admin\DriverPersonalityController@lists');
    Route::resource('DriverPersonality', 'Admin\DriverPersonalityController');
    Route::post('/DriverPersonality/ChangeStatus/{id}', 'Admin\DriverPersonalityController@ChangeStatus');

    Route::post('/DriverTestDriver/Lists', 'Admin\DriverTestDriverController@lists');
    Route::resource('DriverTestDriver', 'Admin\DriverTestDriverController');
    Route::post('/DriverTestDriver/ChangeStatus/{id}', 'Admin\DriverTestDriverController@ChangeStatus');

    Route::post('/DriverTestText/Lists', 'Admin\DriverTestTextController@lists');
    Route::resource('DriverTestText', 'Admin\DriverTestTextController');
    Route::post('/DriverTestText/ChangeStatus/{id}', 'Admin\DriverTestTextController@ChangeStatus');

    Route::post('/Interview/Lists', 'Admin\InterviewController@lists');
    Route::resource('/Interview', 'Admin\InterviewController');
    Route::post('/Interview/SetCriminalDate/{id}', 'Admin\InterviewController@SetCriminalDate');
    Route::post('/Interview/SetSendBack/{id}', 'Admin\InterviewController@SetSendBack');
    Route::post('/Interview/SetFail/{id}', 'Admin\InterviewController@SetFail');

    Route::post('/RecruitApprove/Lists', 'Admin\RecruitApproveController@lists');
    Route::resource('RecruitApprove', 'Admin\RecruitApproveController');
    Route::post('/RecruitApprove/ChangeStatus/{id}', 'Admin\RecruitApproveController@ChangeStatus');

    Route::post('/ManagingApprove/Lists', 'Admin\ManagingApproveController@lists');
    Route::resource('ManagingApprove', 'Admin\ManagingApproveController');
    Route::post('/ManagingApprove/ChangeStatus/{id}', 'Admin\ManagingApproveController@ChangeStatus');

    Route::post('/OperationApprove/Lists', 'Admin\OperationApproveController@lists');
    Route::resource('OperationApprove', 'Admin\OperationApproveController');
    Route::post('/OperationApprove/ChangeStatus/{id}', 'Admin\OperationApproveController@ChangeStatus');

    Route::post('/CheckCriminalHealth/Lists', 'Admin\CheckCriminalHealthController@lists');
    Route::post('CheckCriminalHealth/ChangeApprove', 'Admin\CheckCriminalHealthController@ChangeApprove');
    Route::resource('CheckCriminalHealth', 'Admin\CheckCriminalHealthController');
    Route::get('CheckCriminalHealth/PrintInterviewEvaluation/{id}', 'Admin\CheckCriminalHealthController@PrintInterviewEvaluation');

    Route::post('/DriverCriminalRecord/Lists', 'Admin\DriverCriminalRecordController@lists');
    Route::resource('DriverCriminalRecord', 'Admin\DriverCriminalRecordController');

    Route::post('/DriverHealthRecord/Lists', 'Admin\DriverHealthRecordController@lists');
    Route::resource('DriverHealthRecord', 'Admin\DriverHealthRecordController');

    Route::post('/Driver/Lists', 'Admin\DriverController@lists');
    Route::resource('Driver', 'Admin\DriverController');
    Route::post('/Driver/ChangeStatus/{id}', 'Admin\DriverController@ChangeStatus');

    Route::post('/BookBank/Lists', 'Admin\BookBankController@lists');
    Route::resource('BookBank', 'Admin\BookBankController');
    Route::post('/BookBank/ChangeStatus/{id}', 'Admin\BookBankController@ChangeStatus');

    Route::resource('DriverInContract', 'Admin\DriverInContractController');

    Route::resource('StandbyDriver', 'Admin\StandbyDriverController');


    Route::post('/Equipment/Lists', 'Admin\EquipmentController@lists');
    Route::resource('Equipment', 'Admin\EquipmentController');
    Route::post('/Equipment/ChangeStatus/{id}', 'Admin\EquipmentController@ChangeStatus');

    Route::post('/Company/Lists', 'Admin\CompanyController@lists');
    Route::resource('Company', 'Admin\CompanyController');
    Route::post('/Company/ChangeStatus/{id}', 'Admin\CompanyController@ChangeStatus');

    Route::post('/CreditTerm/Lists', 'Admin\CreditTermController@lists');
    Route::resource('CreditTerm', 'Admin\CreditTermController');
    Route::post('/CreditTerm/ChangeStatus/{id}', 'Admin\CreditTermController@ChangeStatus');

    Route::post('/ContactInfo/Lists', 'Admin\ContactInfoController@lists');
    Route::resource('ContactInfo', 'Admin\ContactInfoController');
    Route::post('/ContactInfo/ChangeStatus/{id}', 'Admin\ContactInfoController@ChangeStatus');
    Route::get('/ContactInfo/GetContactInfo/{id}', 'Admin\ContactInfoController@GetContactInfo');

    Route::post('/Member/Lists', 'Admin\MemberController@lists');
    Route::resource('Member', 'Admin\MemberController');
    Route::post('/Member/ChangeStatus/{id}', 'Admin\MemberController@ChangeStatus');

    Route::post('/Document/Lists', 'Admin\DocumentController@lists');
    Route::resource('Document', 'Admin\DocumentController');
    Route::post('/Document/ChangeStatus/{id}', 'Admin\DocumentController@ChangeStatus');

    Route::post('/RecruitAndOperationApp/Lists', 'Admin\RecruitAndOperationAppController@lists');
    Route::resource('RecruitAndOperationApp', 'Admin\RecruitAndOperationAppController');
    Route::post('RecruitAndOperationApp/ChangeStatus', 'Admin\RecruitAndOperationAppController@ChangeStatus');
    Route::post('RecruitAndOperationApp/SetComment/{id}', 'Admin\RecruitAndOperationAppController@SetComment');
    Route::post('RecruitAndOperationApp/SetInterviewMDS/{id}', 'Admin\RecruitAndOperationAppController@SetInterviewMDS');

    Route::post('/ApproveNewDriver/Lists', 'Admin\ApproveNewDriverController@lists');
    Route::resource('ApproveNewDriver', 'Admin\ApproveNewDriverController');
    Route::post('ApproveNewDriver/SetComment/{id}', 'Admin\ApproveNewDriverController@SetComment');
    Route::post('ApproveNewDriver/ChangeStatus', 'Admin\ApproveNewDriverController@ChangeStatus');

    Route::post('/SignContract/Lists', 'Admin\SignContractController@lists');
    Route::resource('SignContract', 'Admin\SignContractController');
    Route::post('SignContract/ChangeStatus/{id}', 'Admin\SignContractController@ChangeStatus');

    Route::post('/DriverContractFile/Lists', 'Admin\DriverContractFileController@lists');
    Route::resource('DriverContractFile', 'Admin\DriverContractFileController');
    Route::post('DriverContractFile/ChangeStatus/{id}', 'Admin\DriverContractFileController@ChangeStatus');

    Route::post('/HolidayType/Lists', 'Admin\HolidayTypeController@lists');
    Route::resource('HolidayType', 'Admin\HolidayTypeController');
    Route::post('HolidayType/ChangeStatus/{id}', 'Admin\HolidayTypeController@ChangeStatus');

    Route::post('/HolidayCalendar/Lists', 'Admin\HolidayCalendarController@lists');
    Route::resource('HolidayCalendar', 'Admin\HolidayCalendarController');
    Route::post('HolidayCalendar/ChangeStatus/{id}', 'Admin\HolidayCalendarController@ChangeStatus');

    Route::post('/Contact/Lists', 'Admin\ContactController@lists');
    Route::resource('Contact', 'Admin\ContactController');
    Route::post('Contact/ChangeStatus/{id}', 'Admin\ContactController@ChangeStatus');

    Route::post('/DriverMakingLeave/Lists', 'Admin\DriverMakingLeaveController@lists');
    Route::resource('DriverMakingLeave', 'Admin\DriverMakingLeaveController');

    Route::post('/DriverLeaveLineBranch/Lists', 'Admin\DriverLeaveLineBranchController@lists');
    Route::resource('DriverLeaveLineBranch', 'Admin\DriverLeaveLineBranchController');
    Route::post('DriverLeaveLineBranch/ChangeStatus/{id}', 'Admin\DriverLeaveLineBranchController@ChangeStatus');

    Route::post('/DriverLeaveLineApprove/Lists', 'Admin\DriverLeaveLineApproveController@lists');
    Route::resource('DriverLeaveLineApprove', 'Admin\DriverLeaveLineApproveController');
    Route::post('DriverLeaveLineApprove/ChangeStatus/{id}', 'Admin\DriverLeaveLineApproveController@ChangeStatus');

    Route::post('/DriverLeave/Lists', 'Admin\DriverLeaveController@lists');
    Route::resource('DriverLeave', 'Admin\DriverLeaveController');
    Route::post('DriverLeave/ChangeStatus/{id}', 'Admin\DriverLeaveController@ChangeStatus');
    Route::get('DriverLeave/GetNumberLeave/{id}', 'Admin\DriverLeaveController@GetNumberLeave');

    Route::post('/ApplicantsAppointment/Lists', 'Admin\ApplicantsAppointmentController@lists');
    Route::resource('ApplicantsAppointment', 'Admin\ApplicantsAppointmentController');

    Route::post('/ApplicantsFailed/Lists', 'Admin\ApplicantsFailedController@lists');
    Route::resource('ApplicantsFailed', 'Admin\ApplicantsFailedController');

    Route::post('/InterestingApplicants/Lists', 'Admin\InterestingApplicantsController@lists');
    Route::resource('InterestingApplicants', 'Admin\InterestingApplicantsController');

    Route::post('/CollectorGroup/Lists', 'Admin\CollectorGroupController@lists');
    Route::resource('CollectorGroup', 'Admin\CollectorGroupController');
    Route::post('/CollectorGroup/ChangeStatus/{id}', 'Admin\CollectorGroupController@ChangeStatus');

    Route::post('/CollectorUser/Lists', 'Admin\CollectorUserController@lists');
    Route::resource('CollectorUser', 'Admin\CollectorUserController');
    Route::post('/CollectorUser/ChangeStatus/{id}', 'Admin\CollectorUserController@ChangeStatus');

    Route::post('/CollectorCompany/Lists', 'Admin\CollectorCompanyController@lists');
    Route::resource('CollectorCompany', 'Admin\CollectorCompanyController');
    Route::post('/CollectorCompany/ChangeStatus/{id}', 'Admin\CollectorCompanyController@ChangeStatus');

    Route::post('/DriverLeaveApprove/Lists', 'Admin\DriverLeaveApproveController@lists');
    Route::resource('DriverLeaveApprove', 'Admin\DriverLeaveApproveController');

    Route::post('/DriverResign/Lists', 'Admin\DriverResignController@lists');
    Route::resource('DriverResign', 'Admin\DriverResignController');

    Route::post('/DriverResignFile/Lists', 'Admin\DriverResignFileController@lists');
    Route::resource('DriverResignFile', 'Admin\DriverResignFileController');
    Route::post('DriverResignFile/ChangeStatus/{id}', 'Admin\DriverResignFileController@ChangeStatus');

    Route::post('/PriceStructureLineApprove/Lists', 'Admin\PriceStructureLineApproveController@lists');
    Route::resource('PriceStructureLineApprove', 'Admin\PriceStructureLineApproveController');
    Route::post('PriceStructureLineApprove/ChangeStatus/{id}', 'Admin\PriceStructureLineApproveController@ChangeStatus');

    Route::post('/AccountCode/Lists', 'Admin\AccountCodeController@lists');
    Route::resource('AccountCode', 'Admin\AccountCodeController');
    Route::post('AccountCode/ChangeStatus/{id}', 'Admin\AccountCodeController@ChangeStatus');

    Route::post('/ItemCode/Lists', 'Admin\ItemCodeController@lists');
    Route::resource('ItemCode', 'Admin\ItemCodeController');
    Route::post('ItemCode/ChangeStatus/{id}', 'Admin\ItemCodeController@ChangeStatus');

    Route::post('/PriceStructure/Lists', 'Admin\PriceStructureController@lists');
    Route::resource('PriceStructure', 'Admin\PriceStructureController');
    Route::post('PriceStructure/SendApprove/{id}', 'Admin\PriceStructureController@SendApprove');

    Route::post('/PriceStructureHasStaffExpense/Lists', 'Admin\PriceStructureHasStaffExpenseController@lists');
    Route::resource('PriceStructureHasStaffExpense', 'Admin\PriceStructureHasStaffExpenseController');
    Route::post('PriceStructureHasStaffExpense/ChangeStatus/{id}', 'Admin\PriceStructureHasStaffExpenseController@ChangeStatus');

    Route::post('/OtherExpenseHasStaffExpense/Lists', 'Admin\OtherExpenseHasStaffExpenseController@lists');
    Route::resource('OtherExpenseHasStaffExpense', 'Admin\OtherExpenseHasStaffExpenseController');
    Route::post('OtherExpenseHasStaffExpense/ChangeStatus/{id}', 'Admin\OtherExpenseHasStaffExpenseController@ChangeStatus');

    Route::post('/InsuranceFeeHasStaffExpense/Lists', 'Admin\InsuranceFeeHasStaffExpenseController@lists');
    Route::resource('InsuranceFeeHasStaffExpense', 'Admin\InsuranceFeeHasStaffExpenseController');
    Route::post('InsuranceFeeHasStaffExpense/ChangeStatus/{id}', 'Admin\InsuranceFeeHasStaffExpenseController@ChangeStatus');

    Route::post('/InterviewPercenPass/Lists', 'Admin\InterviewPercenPassController@lists');
    Route::resource('InterviewPercenPass', 'Admin\InterviewPercenPassController');
    Route::post('InterviewPercenPass/ChangeStatus/{id}', 'Admin\InterviewPercenPassController@ChangeStatus');

    Route::post('/QuotationLineApprove/Lists', 'Admin\QuotationLineApproveController@lists');
    Route::resource('QuotationLineApprove', 'Admin\QuotationLineApproveController');
    Route::post('QuotationLineApprove/ChangeStatus/{id}', 'Admin\QuotationLineApproveController@ChangeStatus');

    Route::post('/PriceStructureApprove/Lists', 'Admin\PriceStructureApproveController@lists');
    Route::resource('PriceStructureApprove', 'Admin\PriceStructureApproveController');
    Route::post('PriceStructureApprove/ChangeApprove', 'Admin\PriceStructureApproveController@ChangeApprove');

    Route::post('/ProductCategory/Lists', 'Admin\ProductCategoryController@lists');
    Route::resource('ProductCategory', 'Admin\ProductCategoryController');

    Route::post('ReplacementDriver/Lists', 'Admin\ReplacementDriverController@lists');
    Route::resource('ReplacementDriver', 'Admin\ReplacementDriverController');

    Route::resource('Backlog', 'Admin\BacklogController');

    Route::resource('CourseContent', 'Admin\CourseContentController');

    Route::post('/Quotation/Lists', 'Admin\QuotationController@lists');
    Route::resource('Quotation', 'Admin\QuotationController');
    Route::post('Quotation/ChangeStatus/{id}', 'Admin\QuotationController@ChangeStatus');
    Route::post('Quotation/SendPreApprove/{id}', 'Admin\QuotationController@SendPreApprove');
    Route::get('Quotation/PrintQuotatuon/{id}', 'Admin\QuotationController@PrintQuotatuon');
    Route::get('Quotation/PreApproveQuotationView/{id}', 'Admin\QuotationController@PreApproveQuotationView');

    Route::get('Quotation/PrintConfirmLeter/{id}', 'Admin\QuotationController@PrintConfirmLeter');

    Route::post('/QuotationPriceList/QuotationPriceListInsert', 'Admin\QuotationPriceListController@QuotationPriceListInsert');
    Route::post('/QuotationPriceList/QuotationPriceListUpdate', 'Admin\QuotationPriceListController@QuotationPriceListUpdate');
    Route::resource('QuotationPriceList', 'Admin\QuotationPriceListController');

    Route::resource('QuotationPreApproveDetails', 'Admin\QuotationPreApproveDetailsController');

    Route::post('QuotationPreApproveFile/Lists', 'Admin\QuotationPreApproveFileController@lists');
    Route::resource('QuotationPreApproveFile', 'Admin\QuotationPreApproveFileController');

    Route::post('ConfirmQuotation/Lists', 'Admin\ConfirmQuotationController@lists');
    Route::resource('ConfirmQuotation', 'Admin\ConfirmQuotationController');
    Route::post('ConfirmQuotation/ChangeStatus/{id}', 'Admin\ConfirmQuotationController@ChangeStatus');

    Route::post('QuotationGrouping/Lists', 'Admin\QuotationGroupingController@lists');
    Route::post('QuotationGrouping/QuotationGroupingDriverInsert', 'Admin\QuotationGroupingController@QuotationGroupingDriverInsert');
    Route::resource('QuotationGrouping', 'Admin\QuotationGroupingController');
    Route::post('QuotationGrouping/ChangeStatus/{id}', 'Admin\QuotationGroupingController@ChangeStatus');


    Route::post('/PreApprove/Lists', 'Admin\PreApproveController@lists');
    Route::get('/PreApprove/LineApprove/{id}', 'Admin\PreApproveController@show');
    Route::post('/PreApprove/GetQuotation', 'Admin\PreApproveController@quotation_detail');
    Route::post('/PreApprove/GetCost', 'Admin\PreApproveController@getcost');
    Route::post('/PreApprove/PreApproveAction', 'Admin\PreApproveController@update');
    Route::post('/PreApprove/PreApproveActionAll', 'Admin\PreApproveController@updateall');
    Route::get('/PreApprove/print_pre_approve/{id}', 'Admin\PreApproveController@print_pre_approve');
    Route::resource('PreApprove', 'Admin\PreApproveController');

    Route::post('BackOrder/Lists', 'Admin\BackOrderController@lists');
    Route::post('BackOrder/BackOrderInterview/View/{id}', 'Admin\BackOrderController@ViewInterview');
    Route::post('BackOrder/BackOrderInterview/NotpassView/{id}', 'Admin\BackOrderController@ViewNotpassInterview');
    Route::post('BackOrder/BackOrderInterview/Create', 'Admin\BackOrderController@CreateInterview');
    Route::post('BackOrder/BackOrderInterview/Update', 'Admin\BackOrderController@UpdateInterview');
    Route::get('/BackOrder/getViewDetail/{id}', 'Admin\BackOrderController@getViewDetail');
    Route::resource('BackOrder', 'Admin\BackOrderController');

    Route::post('BackOrderSpec/Lists', 'Admin\BackOrderSpecController@lists');
    Route::post('BackOrderSpec/BackOrderInterview/Reject/{id}', 'Admin\BackOrderSpecController@Reject');
    Route::post('BackOrderSpec/Getamphur', 'Admin\BackOrderSpecController@getamphur');
    Route::post('BackOrderSpec/Getdistrict', 'Admin\BackOrderSpecController@getdistric');

    Route::post('BackOrderSpec/Getarea', 'Admin\BackOrderSpecController@getarea');
    Route::resource('BackOrderSpec', 'Admin\BackOrderSpecController');


    Route::post('CustomerContract/Lists', 'Admin\CustomerContractController@lists');
    Route::resource('CustomerContract', 'Admin\CustomerContractController');
    Route::post('CustomerContract/Cancel/{id?}', 'Admin\CustomerContractController@Cancel');
    Route::post('CustomerContract/SendApprove/{id?}', 'Admin\CustomerContractController@SendApprove');
    Route::post('CustomerContract/MakeTimesheet/{id}', 'Admin\CustomerContractController@MakeTimesheet');
    Route::get('CustomerContract/OtSetting/{id}', 'Admin\CustomerContractController@OtSetting');
    Route::get('CustomerContract/OtSettingDriver/{id}', 'Admin\CustomerContractController@OtSettingDriver');
    Route::get('CustomerContract/PrintContract/{type}/{id}', 'Admin\CustomerContractController@PrintContract');


    Route::post('/CustomerContractFile/Lists', 'Admin\CustomerContractFileController@lists');
    Route::resource('CustomerContractFile', 'Admin\CustomerContractFileController');
    Route::post('CustomerContractFile/ChangeStatus/{id}', 'Admin\CustomerContractFileController@ChangeStatus');

    Route::post('TimesheetContractOt/Lists', 'Admin\TimesheetContractOtController@lists');
    Route::resource('TimesheetContractOt', 'Admin\TimesheetContractOtController');
    Route::post('TimesheetContractOt/ChangeStatus/{id}', 'Admin\TimesheetContractOtController@ChangeStatus');

    Route::post('TimesheetContract/Lists', 'Admin\TimesheetContractController@lists');
    Route::resource('TimesheetContract', 'Admin\TimesheetContractController');
    Route::post('TimesheetContract/ChangeStatus/{id}', 'Admin\TimesheetContractController@ChangeStatus');
    Route::post('TimesheetContract/UpdateTaxiPriceSetting/{customer_contract_id}', 'Admin\TimesheetContractController@UpdateTaxiPriceSetting');
    Route::post('TimesheetContract/UpdateShift/{customer_contract_id}', 'Admin\TimesheetContractController@UpdateShift');

    Route::post('DriverWorking/Lists', 'Admin\DriverWorkingController@lists');
    Route::resource('DriverWorking', 'Admin\DriverWorkingController');
    Route::get('GetDriverWorkingByCustomerContract/{id}', 'Admin\DriverWorkingController@GetDriverWorkingByCustomerContract');
    Route::get('GetDriverWorkingByStatus/{status}', 'Admin\DriverWorkingController@GetDriverWorkingByStatus');

    Route::post('TimesheetHolidayCalendar/Lists', 'Admin\TimesheetHolidayCalendarController@lists');
    Route::resource('TimesheetHolidayCalendar', 'Admin\TimesheetHolidayCalendarController');
    Route::post('TimesheetHolidayCalendar/ChangeStatus/{id}', 'Admin\TimesheetHolidayCalendarController@ChangeStatus');

    Route::post('TimesheetContractDriverOt/Lists', 'Admin\TimesheetContractDriverOtController@lists');
    Route::resource('TimesheetContractDriverOt', 'Admin\TimesheetContractDriverOtController');
    Route::post('TimesheetContractDriverOt/ChangeStatus/{id}', 'Admin\TimesheetContractDriverOtController@ChangeStatus');

    Route::post('TimesheetContractDriver/Lists', 'Admin\TimesheetContractDriverController@lists');
    Route::resource('TimesheetContractDriver', 'Admin\TimesheetContractDriverController');
    Route::post('TimesheetContractDriver/ChangeStatus/{id}', 'Admin\TimesheetContractDriverController@ChangeStatus');
    Route::post('TimesheetContractDriver/UpdateTaxiPriceSetting/{customer_contract_id}', 'Admin\TimesheetContractDriverController@UpdateTaxiPriceSetting');
    Route::post('TimesheetContractDriver/UpdateShift/{customer_contract_id}', 'Admin\TimesheetContractDriverController@UpdateShift');

    Route::post('TimesheetHolidayCalendarDriver/Lists', 'Admin\TimesheetHolidayCalendarDriverController@lists');
    Route::resource('TimesheetHolidayCalendarDriver', 'Admin\TimesheetHolidayCalendarDriverController');
    Route::post('TimesheetHolidayCalendarDriver/ChangeStatus/{id}', 'Admin\TimesheetHolidayCalendarDriverController@ChangeStatus');

    Route::post('Timesheet/Lists', 'Admin\TimesheetController@lists');
    Route::get('Timesheet/TimeToWork', 'Admin\TimesheetController@TimeToWork');
    Route::resource('Timesheet', 'Admin\TimesheetController');
    Route::post('Timesheet/ChangeStatus/{id}', 'Admin\TimesheetController@ChangeStatus');
    Route::get('Timesheet/GetStaffExpenseByQuotationPriceList/{quotation_price_list_id}', 'Admin\TimesheetController@GetStaffExpenseByQuotationPriceList');
    Route::post('Timesheet/InsertTimesheetContractDriverAddOn', 'Admin\TimesheetController@InsertTimesheetContractDriverAddOn');
    Route::get('Timesheet/GetTimesheetContractDriverOt/{customer_contract_id}', 'Admin\TimesheetController@GetTimesheetContractDriverOt');


    Route::post('ApproveContract/Lists', 'Admin\ApproveContractController@lists');
    Route::resource('ApproveContract', 'Admin\ApproveContractController');

    Route::post('ApproveDriverRelease/Lists', 'Admin\ApproveDriverReleaseController@lists');
    Route::resource('ApproveDriverRelease', 'Admin\ApproveDriverReleaseController');


    Route::post('InvoiceSchedule/Lists', 'Admin\InvoiceScheduleController@lists');
    Route::post('InvoiceSchedule/SaleorderLists', 'Admin\InvoiceScheduleController@lists_sale_order');
    Route::post('InvoiceSchedule/Updatebill', 'Admin\InvoiceScheduleController@update_bill_sale_order');
    Route::post('InvoiceSchedule/Updatebillall', 'Admin\InvoiceScheduleController@update_bill_sale_order_all');
    Route::resource('InvoiceSchedule', 'Admin\InvoiceScheduleController');
//
    Route::resource('Invoice', 'Admin\InvoiceController');

    Route::resource('CreditNote', 'Admin\CreditNoteController');

    Route::resource('Bill', 'Admin\BillController');

    Route::resource('Receipt', 'Admin\ReceiptController');

    Route::resource('DriverProfileReport', 'Admin\DriverProfileReportController');

    Route::resource('DriverLeaveReport', 'Admin\DriverLeaveReportController');

    Route::resource('WageAdjustmentReport', 'Admin\WageAdjustmentReportController');

    Route::resource('ResignationReport', 'Admin\ResignationReportController');

    Route::resource('RCTReport', 'Admin\RCTReportController');

    Route::resource('StaffingReport', 'Admin\StaffingReportController');

    Route::resource('CourseContentReport', 'Admin\CourseContentReportController');

    Route::resource('MonthlyDriverTrainingReport', 'Admin\MonthlyDriverTrainingReportController');

    Route::resource('MonthlyWithdrawalUniformReport', 'Admin\MonthlyWithdrawalUniformReportController');

    Route::resource('MonthlyUniformSummaryReport', 'Admin\MonthlyUniformSummaryReportController');

    Route::resource('MonthlyWorkStartReport', 'Admin\MonthlyWorkStartReportController');

    Route::resource('MonthlyJobInterviewReport', 'Admin\MonthlyJobInterviewReportController');

    Route::resource('TempleteSAReport', 'Admin\TempleteSAReportController');

    Route::resource('TemplateCustomerReport', 'Admin\TemplateCustomerReportController');

    Route::resource('TempleteSVReport', 'Admin\TempleteSVReportController');

    Route::resource('TemplateRIRVReport', 'Admin\TemplateRIRVReportController');

    Route::resource('TemplatePaymentReport', 'Admin\TemplatePaymentReportController');

    Route::resource('DeliveryReportCommission', 'Admin\DeliveryReportCommissionController');

    Route::resource('DeliveryReportDetail', 'Admin\DeliveryReportDetailController');

    Route::resource('QuotationReport', 'Admin\QuotationReportController');

    Route::resource('ConfirmationReport', 'Admin\ConfirmationReportController');

    Route::resource('ReportSaleOutputTax', 'Admin\ReportSaleOutputTaxController');

    Route::resource('ReportSaleMonthlyOtPay', 'Admin\ReportSaleMonthlyOtPayController');

    Route::resource('ReportSaleDebtAgeCustomer', 'Admin\ReportSaleDebtAgeCustomerController');

    Route::resource('ReportMonthlyDriverTraining', 'Admin\ReportMonthlyDriverTrainingController');

    Route::resource('RepoarRecBackOrder', 'Admin\RepoarRecBackOrderController');

    Route::resource('ReportDriverLeave', 'Admin\ReportDriverLeaveController');

    Route::resource('ReportWageAdjustment', 'Admin\ReportWageAdjustmentController');

    Route::resource('ReportResignation', 'Admin\ReportResignationController');

    Route::resource('ReportRct', 'Admin\ReportRctController');

    Route::resource('ReportStaffing', 'Admin\ReportStaffingController');

    Route::resource('ReportMonthlyWithdrawalUniform', 'Admin\ReportMonthlyWithdrawalUniformController');

    Route::resource('ReportMonthlyJobInterview', 'Admin\ReportMonthlyJobInterviewController');

    Route::resource('ReportRecContractNumber', 'Admin\ReportRecContractNumberController');

    Route::resource('ReportRecNumberOfDriver', 'Admin\ReportRecNumberOfDriverController');

    Route::resource('ReportRecEmployeeCard', 'Admin\ReportRecEmployeeCardController');

    Route::resource('ReportRecAnnualTraining', 'Admin\ReportRecAnnualTrainingController');

    Route::resource('ReportRecHealthCheck', 'Admin\ReportRecHealthCheckController');

    Route::resource('ReportRecFindDriverAsNeeded', 'Admin\ReportRecFindDriverAsNeededController');

    Route::resource('ReportRecDeductGuarantee', 'Admin\ReportRecDeductGuaranteeController');

    Route::resource('ReportRecLeaveCompensation', 'Admin\ReportRecLeaveCompensationController');

    Route::resource('ReportRecYearsExperience', 'Admin\ReportRecYearsExperienceController');
});

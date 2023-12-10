<?php

use App\Http\Controllers\API\AnalysisRequestController;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\CompoundClassController;
use App\Http\Controllers\API\CompoundController;
use App\Http\Controllers\API\CompoundSubclassController;
use App\Http\Controllers\API\DosageController;
use App\Http\Controllers\API\DoseRouteController;
use App\Http\Controllers\API\EEGController;
use App\Http\Controllers\API\EffectonSleepController;
use App\Http\Controllers\API\EmailController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\ExperimentalConditionController;
use App\Http\Controllers\API\GeneticallyModifiedTypeController;
use App\Http\Controllers\API\GroupController;
use App\Http\Controllers\API\ResultFilesController;
use App\Http\Controllers\API\SpecieController;
use App\Http\Controllers\API\StrainController;
use App\Http\Controllers\API\StudyController;
use App\Http\Controllers\API\SubjectAnalysisController;
use App\Http\Controllers\API\SubjectController;
use App\Http\Controllers\API\TargetClassController;
use App\Http\Controllers\API\TimePointController;
use App\Http\Controllers\API\TargetController;
use App\Http\Controllers\AutenticateController;
use App\Http\Controllers\FileTestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['jwt.verify']], function() {
    // Route::get('v1/user',[UserController::class,'getAuthenticatedUser'])->middleware('role:admin');
    Route::post('v1/logout',[AutenticateController::class,'Logout']);
});

Route::group(['prefix'=>'v1'],function(){

    Route::post('register', [AutenticateController::class,'register']);
    Route::post('login', [AutenticateController::class,'authenticate']);

    /**Code verified */
    Route::post('sendexpirytcode',[EmailController::class,'SendExpirytCode']);
    Route::post('verifycode',[EmailController::class,'VerifyEmailCode']);

    /**Company */
    Route::resource('company', CompanyController::class);
    Route::put('company_delete/{company}',[CompanyController::class,'destroy']);

    /**TimePoint */
    Route::resource('timepoint',TimePointController::class);
    Route::put('timepoint_delete/{timepoint}',[TimePointController::class,'destroy']);

    /**Employee */
    Route::resource('employee',EmployeeController::class);
    Route::put('employee_delete/{employee}',[EmployeeController::class,'destroy']);

    /**Study */
    Route::resource('study',StudyController::class);
    Route::put('study_delete/{study}',[StudyController::class,'destroy']);

    /**Compound Class */
    Route::resource('compoundclass',CompoundClassController::class);
    Route::put('compoundclass_delete/{compoundclass}',[CompoundClassController::class,'destroy']);

    /**Compound */
    Route::resource('compound',CompoundController::class);
    Route::put('compound_delete/{compound}',[CompoundController::class,'destroy']);

    /**Compound SubClass */
    Route::resource('compoundsubclass',CompoundSubclassController::class);
    Route::put('compoundsubclass_delete/{compoundsubclass}',[CompoundSubclassController::class,'destroy']);

    /**Dosage */
    Route::resource('dosage',DosageController::class);
    Route::put('dosage_delete/{dosage}',[DosageController::class,'destroy']);

    /**Dosage Route */
    Route::resource('dosageroute',DoseRouteController::class);
    Route::put('dosageroute_delete/{dosageroute}',[DoseRouteController::class,'destroy']);

    /**EEG */
    Route::resource('eeg',EEGController::class);
    Route::put('eeg_delete/{eeg}',[EEGController::class,'destroy']);

    /**Effecton Sleep */
    Route::resource('effectionsleep',EffectonSleepController::class);
    Route::put('effectionsleep_delete/{effectionsleep}',[EffectonSleepController::class,'destroy']);

    /**Experimental Condition */
    Route::resource('experimental',ExperimentalConditionController::class);
    Route::put('experimental_delete/{experimental}',[ExperimentalConditionController::class,'destroy']);

    /**genetically */
    Route::resource('genetically',GeneticallyModifiedTypeController::class);
    Route::put('genetically_delete/{genetically}',[GeneticallyModifiedTypeController::class,'destroy']);

    /**Group */
    Route::resource('group',GroupController::class);
    Route::put('group_delete/{group}',[GroupController::class,'destroy']);

    /**Result files */
    Route::resource('resultfiles',ResultFilesController::class);
    Route::put('resultfiles_delete/{resultfiles}',[ResultFilesController::class,'destroy']);

    /**Specie  */
    Route::resource('specie',SpecieController::class);
    Route::put('specie_delete/{specie}',[SpecieController::class,'destroy']);

    /**Strain  */
    Route::resource('strain',StrainController::class);
    Route::put('strain_delete/{strain}',[StrainController::class,'destroy']);

    /**Target Class  */
    Route::resource('targetclass',TargetClassController::class);
    Route::put('targetclass_delete/{target}',[TargetClassController::class,'destroy']);

    /**Target */
    Route::resource('target',TargetController::class);
    Route::put('target_delete/{target}',[TargetController::class,'destroy']);

    /**Subject */
    Route::resource('subject',SubjectController::class);
    Route::put('subject_delete/{subject}',[SubjectController::class,'destroy']);

    /**Subject Analysis */
    Route::resource('subjectanalysis',SubjectAnalysisController::class);
    Route::put('subjectanalysis_delete/{subjectanalysi}',[SubjectAnalysisController::class,'destroy']);

    /**Analysis Request */
    Route::resource('analysisrequest',AnalysisRequestController::class);
    Route::put('analysisrequest_delete/{analysis}',[AnalysisRequestController::class,'destroy']);

    /**File Test */
    Route::post('upload_filestudy',[FileTestController::class,'upLoad_file']);
    Route::get('download_filestudy/{id}',[FileTestController::class,'download']);

});




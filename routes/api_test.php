<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Building\AccountPlanController;
use App\Http\Controllers\Building\BankAccountController;
use App\Http\Controllers\Building\CustomerController;
use App\Http\Controllers\Building\CustomTableTemplateController;
use App\Http\Controllers\Building\DocAccountController;
use App\Http\Controllers\Building\DocAccountListController;
use App\Http\Controllers\Building\DocApprovalController;
use App\Http\Controllers\Building\DocAttachFileController;
use App\Http\Controllers\Building\DocDetailController;
use App\Http\Controllers\Building\DocDetailsLocationController;
use App\Http\Controllers\Building\DocInfoController;
use App\Http\Controllers\Building\DocItemTransferController;
use App\Http\Controllers\Building\DocItemTransferGalleryController;
use App\Http\Controllers\Building\DocItemTransferListController;
use App\Http\Controllers\Building\DocPaymentController;
use App\Http\Controllers\Building\ItemController;
use App\Http\Controllers\Building\SysAccountController;
use App\Http\Controllers\Building\SysBankController;
use App\Http\Controllers\Building\SysDocController;
use App\Http\Controllers\Building\SysLocationCustomerController;
use App\Http\Controllers\Building\SysPayByController;
use App\Http\Controllers\Building\SysPlanController;
use App\Http\Controllers\Building\SysRelationshipController;
use App\Http\Controllers\Building\SysTaxMetaController;
use App\Http\Controllers\Building\SysTypeListController;
use App\Http\Controllers\Building\SysWithholdingController;
use App\Http\Controllers\Building\VendorController;
use App\Http\Controllers\GeneralController;







// searching
use App\Http\Controllers\Building\SearchingController;

Route::post('login', [AuthController::class, 'login']);
Route::group(['middleware' => ['auth:api']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::post('/check-login', [AuthController::class, 'check']);
        Route::post('/get-profile', [AuthController::class, 'userDetail']);
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/user-update', [AuthController::class, 'updateUser']);
        Route::post('/reset-password', [AuthController::class, 'resetPassword']);
        Route::post('/user-delete', [AuthController::class, 'deleteUser']);
        Route::get('/user-list', [AuthController::class, 'listUser']);
        Route::get('/user-infor', [AuthController::class, 'userInfor']);
    });
});

Route::group(['middleware' => ['auth:api']], function () {
    // searching
    Route::post('/searching/home', [SearchingController::class, 'searchingHome']);
    Route::post('/searching/export', [SearchingController::class, 'ExportBySearching']);
    Route::post('/searching/documents', [SearchingController::class, 'searchingDocuments']);
    Route::post('/searching/documents/summary', [SearchingController::class, 'summaryDocuments']);
    Route::post('/searching/documents/export', [SearchingController::class, 'ExportBySearchingDocuments']);
    Route::post('/searching/items', [SearchingController::class, 'searchingItems']);
    Route::post('/searching/items/summary', [SearchingController::class, 'summaryItems']);
    Route::post('/searching/items/export', [SearchingController::class, 'ExportBySearchingItems']);

    // custom table template
    Route::get('/templates', [CustomTableTemplateController::class, 'getTemplates']);
    Route::post('/templates', [CustomTableTemplateController::class, 'createTemplate']);
    Route::get('/templates/{id}', [CustomTableTemplateController::class, 'getTemplateDetail']);
    Route::patch('/templates/{id}', [CustomTableTemplateController::class, 'updateTemplate']);
    Route::delete('/templates/{id}', [CustomTableTemplateController::class, 'deleteTemplate']);

    // material data
    Route::group(['prefix' => 'data'], function () {
        Route::apiResources([
            'customers' => CustomerController::class,
            'items' => ItemController::class,
            'vendors' => VendorController::class,
            'sys-account' => SysAccountController::class,
            'sys-bank' => SysBankController::class,
            'sys-doc' => SysDocController::class,
            'sys-location-customer' => SysLocationCustomerController::class,
            'sys-payby' => SysPayByController::class,
            'sys-plan' => SysPlanController::class,
            'sys-relationship' => SysRelationshipController::class,
            'sys-taxmeta' => SysTaxMetaController::class,
            'sys-type-list' => SysTypeListController::class,
            'sys-withholding' => SysWithholdingController::class
        ]);
        Route::post('/items/multiple-keywords', [ItemController::class, 'searchingItems']);
    });

    // documentation
    Route::group(['prefix' => 'documentation'], function () {
        Route::apiResources([
            'infos' => DocInfoController::class,
            'details' => DocDetailController::class,
            'details-location' => DocDetailsLocationController::class,
            'item-transfers' => DocItemTransferController::class,
            'item-transfer-galleries' => DocItemTransferGalleryController::class,
            'item-transfer-lists' => DocItemTransferListController::class,
            'attach-files' => DocAttachFileController::class,
            'payments' => DocPaymentController::class,
            'accounts' => DocAccountController::class,
            'account-lists' => DocAccountListController::class,
            'approvals' => DocApprovalController::class,
            'account-plans' => AccountPlanController::class,
            'bank-accounts' => BankAccountController::class,
        ]);
        Route::post('approvals-json', [DocApprovalController::class, 'createJson']);
    });
    Route::post('image-to-base', [GeneralController::class, 'imageToBase64']);
});

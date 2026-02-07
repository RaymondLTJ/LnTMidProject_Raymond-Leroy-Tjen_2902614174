<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', UserController::class);
Route::apiResource('perusahaan', PerusahaanController::class);
Route::apiResource('magang', MagangController::class);
Route::apiResource('report', ReportController::class);
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SentimentAnalysisController;

Route::post('/analyze', [SentimentAnalysisController::class, 'analyze']);

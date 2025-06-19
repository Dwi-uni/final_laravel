use App\Http\Controllers\ReportController;

Route::get('/laporan', [ReportController::class, 'index'])->name('laporan.index');
Route::get('/laporan/export/pdf', [ReportController::class, 'exportPdf'])->name('laporan.export.pdf');
Route::get('/laporan/export/excel', [ReportController::class, 'exportExcel'])->name('laporan.export.excel');

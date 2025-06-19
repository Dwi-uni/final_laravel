namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;

class ReportController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        $categories = Category::withCount('products')->get();

        return view('laporan.index', compact('products', 'categories'));
    }

    public function exportPdf()
    {
        $products = Product::with('category')->get();
        $pdf = Pdf::loadView('laporan.pdf', compact('products'));
        return $pdf->download('laporan-produk.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new ProductExport, 'laporan-produk.xlsx');
    }
}

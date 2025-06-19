namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Product::with('category')->get()->map(function ($item) {
            return [
                $item->name,
                $item->category->name,
                $item->price,
                $item->stock,
            ];
        });
    }

    public function headings(): array
    {
        return ['Nama Produk', 'Kategori', 'Harga', 'Stok'];
    }
}

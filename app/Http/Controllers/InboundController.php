<?php

namespace App\Http\Controllers;

use App\Models\Inbound;
use App\Models\Product;
use App\Models\Rack;
use App\Models\IncomingItem;
use App\Models\Stock;
use Illuminate\Http\Request;

class InboundController extends Controller
{
    public function index()
    {
        return view('barang_masuk.index', [
            'products' => Product::all(),            
            'racks'    => Rack::all(),                
            'incoming' => Inbound::with('product', 'rack')->latest()->get(),        
        ]);
    }

    public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'rack_id'    => 'required|exists:racks,id',
        'jumlah'     => 'required|integer|min:1',
        'tanggal'    => 'required|date',
    ]);

    Inbound::create([
        'product_id' => $request->product_id,
        'rack_id'    => $request->rack_id,
        'jumlah'     => $request->jumlah,
        'tanggal'    => $request->tanggal,
    ]);

    $stock = Stock::firstOrCreate(
        [
            'product_id' => $request->product_id,
            'rak_id'     => $request->rack_id,
        ],
        [
            'jumlah_stok' => 0
        ]
    );

    $stock->increment('jumlah_stok', $request->jumlah);

    return redirect()->back()->with('success', 'Barang masuk berhasil disimpan');
}


    public function destroy($id)
    {
        $item = Inbound::findOrFail($id);

        $product = Product::with('stock')->find($item->product_id);
        if ($product->stock) {
            $product->stock->decrement('stok', $item->jumlah);
        }

        $item->delete();

        return redirect()->back()->with('success', 'Data barang masuk berhasil dihapus.');
    }
    
}

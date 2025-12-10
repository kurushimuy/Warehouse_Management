<?php

namespace App\Http\Controllers;

use App\Models\Inbound;
use App\Models\Product;
use App\Models\Rack;
use App\Models\IncomingItem;
use Illuminate\Http\Request;

class InboundController extends Controller
{
    public function index()
    {
        return view('barang_masuk.index', [
            'products' => Product::all(),               // untuk dropdown nama barang
            'racks'    => Rack::all(),                  // untuk dropdown rak
            'incoming' => Inbound::with('product', 'rack')->latest()->get(),          // menampilkan data barang masuk
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'rack_id'    => 'required',
            'jumlah'     => 'required|integer|min:1',
        ]);

        $product = Product::with('stock')->find($request->product_id);

        Inbound::create([
            'product_id' => $request->product_id,
            'rack_id'    => $request->rack_id,
            'jumlah'     => $request->jumlah,
            'tanggal'    => $request->tanggal,
        ]);

        if ($product->stock) {
            $product->stock->increment('stok', $request->jumlah);
        } else {
            $product->stock()->create([
                'stok' => $request->jumlah
            ]);
        }

        return redirect()->back()->with('success', 'Barang masuk berhasil ditambahkan.');
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

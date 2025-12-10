<x-layout title="Barang Masuk">

    <h2 class="text-2xl font-bold mb-4">⬇️ Barang Masuk</h2>

    <div class="panel-light mb-6 p-4 rounded shadow">
        <h3 class="text-xl font-semibold mb-3">➕ Tambah Barang Masuk</h3>

        <form action="{{ route('barang-masuk.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-2 gap-4">

                <div>
                    <label class="font-semibold">Produk</label>
                    <select name="product_id" class="w-full p-2 border rounded" required>
                        @foreach($products as $p)
                            <option value="{{ $p->id }}">{{ $p->nama_produk }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="font-semibold">Jumlah Masuk</label>
                    <input type="number" name="jumlah" class="w-full p-2 border rounded" required>
                </div>

                <div>
                    <label class="font-semibold">Tanggal Masuk</label>
                    <input type="date" name="tanggal" class="w-full p-2 border rounded"
                        value="{{ date('Y-m-d') }}" required>
                </div>

                {{-- RAK --}}
                <div>
                    <label class="font-semibold">Rak Penyimpanan</label>
                    <select name="rak_id" class="w-full p-2 border rounded">
                        @foreach($racks as $rak)
                            <option value="{{ $rak->id }}">{{ $rak->kode_rak }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <button type="submit"
                class="mt-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Simpan Barang Masuk
            </button>
        </form>
    </div>

    <div class="panel-light">
        <table class="w-full">
            <thead>
                <tr class="border-b">
                    <th class="p-3">Tanggal</th>
                    <th class="p-3">Barang</th>
                    <th class="p-3">Jumlah</th>
                    <th class="p-3">Rak</th>
                </tr>
            </thead>

            <tbody>
                @foreach($incoming as $item)
                    <tr>    
                        <td class="p-3">{{ $item->tanggal }}</td>
                        <td class="p-3">{{ $item->product->nama_produk }}</td>
                        <td class="p-3">{{ $item->jumlah }}</td>
                        <td class="p-3">{{ $item->rak->kode_rak }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layout>

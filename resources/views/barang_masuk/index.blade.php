<x-layout title="Barang Masuk">

<h2 class="text-2xl font-bold mb-4">⬇️ Barang Masuk</h2>

<form action="{{ route('barang-masuk.store') }}" method="POST" class="mb-6">
    @csrf

    <div class="grid grid-cols-2 gap-4">

        <div>
            <label>Produk</label>
            <select name="product_id" class="w-full border p-2" required>
                <option value="">-- Pilih Produk --</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->nama_produk }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Jumlah Masuk</label>
            <input type="number" name="jumlah" class="w-full border p-2" required>
        </div>

        <div>
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="w-full border p-2"
                   value="{{ date('Y-m-d') }}">
        </div>

        <div>
            <label>Rak</label>
            <select name="rack_id" class="w-full border p-2" required>
                <option value="">-- Pilih Rak --</option>
                @foreach ($racks as $rack)
                    <option value="{{ $rack->id }}">
                        {{ $rack->kode_rak }}
                    </option>
                @endforeach
            </select>
        </div>

    </div>

    <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">
        Simpan Barang Masuk
    </button>
</form>

<hr>

<table class="w-full">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Rak</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($incoming as $item)
        <tr>
            <td>{{ $item->tanggal }}</td>
            <td>{{ $item->product->nama_produk }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->rack->kode_rak }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</x-layout>

<x-layout title="Barang Masuk">

<h2 class="text-2xl font-bold">⬇️ Barang Masuk</h2>

<form action="{{ route('barang-masuk.store') }}" method="POST" class="panel-light">
@csrf

<div class="grid grid-cols-2 gap-4">

    <div>
        <label>Produk</label>
        <select name="product_id" class="input">
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
        <input type="number" name="jumlah" class="input">
    </div>

    <div>
        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal" class="input">
    </div>

    <div>
        <label>Rak Penyimpanan</label>
        <select name="rack_id" class="input">
            <option value="">-- Pilih Rak --</option>
            @foreach ($racks as $rack)
                <option value="{{ $rack->id }}">
                    {{ $rack->kode_rak }}
                </option>
            @endforeach
        </select>
    </div>

</div>

<button class="btn-primary mt-4">Simpan</button>
</form>

</x-layout>

<form action="{{ route('buku.update',$buku->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <x-input-label for="nama_buku">{{ __('Judul Buku') }}</x-input-label>
        <x-text-input id="nama_buku" class="mt-1 block w-full" type="text" name="nama_buku"
            value="{{ old('nama_buku',$buku->nama_buku) }}" required />
        @error('nama_buku')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <div class="mb-4">
        <x-input-label for="penulis">{{ __('Nama Pengarang') }}</x-input-label>
        <x-text-input id="penulis" class="mt-1 block w-full" type="text" name="penulis" value="{{ old('penulis',$buku->penulis) }}"
            required />
        @error('penulis')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>


    <div class="mb-4">
        <x-input-label for="tahun_rilis">{{ __('Tahun Rilis') }}</x-input-label>
        <x-text-input id="tahun_rilis" class="mt-1 block w-full" type="number" name="tahun_rilis"
            value="{{ old('tahun_rilis',$buku->tahun_rilis) }}" required />
        @error('tahun_rilis')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <div class="mb-4">
        <x-input-label for="status">{{ __('Status') }}</x-input-label>
        <select id="status" name="status" class="mt-1 block w-full" required>
            <option value="Benar">Benar</option>
            <option value="Salah">Salah</option>
            <option value="Ubah">Ubah</option>
        </select>
        @error('status')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    </div>

    <br/>

    <div class="flex items-center space-x-4">
        <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800">
            {{ __('Simpan') }}
        </x-primary-button>

        <x-secondary-button href="{{ route('buku.index') }}">
            Kembali
        </x-secondary-button>

    </div>

</form>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Tambah Data User.') }}
        </p>
    </header>

    <form method="post" action="{{ route('user.store') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="nama" :value="__('Name')" />
            <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full" :value="old('nama')"
                required autofocus autocomplete="nama" />
            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
        </div>
        <!-- Address -->
        <div>
            <x-input-label for="alamat" :value="__('Alamat')" />
            <x-text-input id="alamat" name="alamat" type="text" class="mt-1 block w-full" :value="old('alamat')"
                required autocomplete="alamat" />
            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
        </div>

        <!-- Phone -->
        <div>
            <x-input-label for="telepon" :value="__('No HP')" />
            <x-text-input id="telepon" name="telepon" type="number" class="mt-1 block w-full" :value="old('telepon')"
                required autocomplete="telepon" />
            <x-input-error class="mt-2" :messages="$errors->get('telepon')" />
        </div>

        <!-- Identity (e.g., ID number, Passport number) -->
        <div>
            <x-input-label for="identitas" :value="__('NIS / NIP')" />
            <x-text-input id="identitas" name="identitas" type="text" class="mt-1 block w-full" :value="old('identitas')"
                required autocomplete="identitas" />
            <x-input-error class="mt-2" :messages="$errors->get('identitas')" />
        </div>

        <!-- Class -->
        <div>
            <x-input-label for="kelas" :value="__('Kelas')" />
            <x-text-input id="kelas" name="kelas" type="text" class="mt-1 block w-full" :value="old('kelas')"
                required autocomplete="kelas" />
            <x-input-error class="mt-2" :messages="$errors->get('kelas')" />
        </div>

        <div class="mb-4">
            <x-input-label for="role">{{ __('Role') }}</x-input-label>
            <select id="role" name="role" class="mt-1 block w-full" required>
                @if (auth()->user()->kepala == true)
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                @else
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="siswa"  {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                @endif
            </select>
            @error('role')
                <x-input-error-set :message="$message" class="mt-2" />
            @enderror
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

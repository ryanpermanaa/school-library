<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Perbarui password')" :subheading="__('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak untuk menjaga keamanannya')">
        <form wire:submit="updatePassword" class="mt-6 space-y-6">
            <flux:input wire:model="current_password" :label="__('Password saat ini')" type="password" required
                autocomplete="current-password" />
            <flux:input wire:model="password" :label="__('Password baru')" type="password" required
                autocomplete="new-password" />
            <flux:input wire:model="password_confirmation" :label="__('Konfirmasi password')" type="password" required
                autocomplete="new-password" />

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">{{ __('Simpan') }}</flux:button>
                </div>

                <x-action-message class="me-3" on="password-updated">
                    {{ __('Disimpan.') }}
                </x-action-message>
            </div>
        </form>
    </x-settings.layout>
</section>

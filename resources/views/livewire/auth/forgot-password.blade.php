 <div class="flex flex-col gap-6">
     <x-auth-header :title="__('Lupa Password')" :description="__('Masukkan email Anda untuk menerima tautan pengaturan ulang kata sandi')" />

     <!-- Session Status -->
     <x-auth-session-status class="text-center" :status="session('status')" />

     <form wire:submit="sendPasswordResetLink" class="flex flex-col gap-6">
         <!-- Email Address -->
         <flux:input wire:model="email" :label="__('Email')" type="email" required autofocus
             placeholder="email@example.com" />

         <flux:button variant="primary" type="submit" class="w-full">{{ __('Kirim link reset password') }}</flux:button>
     </form>

     <div class="space-x-1 text-center text-sm text-zinc-400">
         {{ __('Atau kembali ke') }}
         <flux:link :href="route('login')" wire:navigate>{{ __('log in') }}</flux:link>
     </div>
 </div>

<div>
    @if(session()->has('message'))
        <div class="bg-green-50 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6 flex items-center gap-3" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
            <i class="fas fa-check-circle text-green-500 text-xl"></i>
            <span>{{ session('message') }}</span>
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-5">
        <div>
            <label class="block text-gray-700 font-semibold mb-2">
                <i class="fas fa-user mr-2 text-blue-600"></i> Nama Lengkap
            </label>
            <input type="text" wire:model="name"
                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition @error('name') border-red-500 @enderror"
                placeholder="Masukkan nama lengkap Anda">
            @error('name')
                <span class="text-red-500 text-sm mt-1 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">
                <i class="fas fa-envelope mr-2 text-blue-600"></i> Alamat Email
            </label>
            <input type="email" wire:model="email"
                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition @error('email') border-red-500 @enderror"
                placeholder="contoh@email.com">
            @error('email')
                <span class="text-red-500 text-sm mt-1 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">
                <i class="fas fa-tag mr-2 text-blue-600"></i> Subjek
            </label>
            <input type="text" wire:model="subject"
                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition @error('subject') border-red-500 @enderror"
                placeholder="Judul pesan Anda">
            @error('subject')
                <span class="text-red-500 text-sm mt-1 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">
                <i class="fas fa-comment mr-2 text-blue-600"></i> Pesan
            </label>
            <textarea wire:model="message" rows="5"
                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition resize-none @error('message') border-red-500 @enderror"
                placeholder="Tulis pesan Anda di sini..."></textarea>
            @error('message')
                <span class="text-red-500 text-sm mt-1 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span>
            @enderror
        </div>

        <button type="submit"
            class="w-full btn-primary text-white py-3 rounded-xl font-semibold inline-flex items-center justify-center gap-2 hover:scale-[1.02] transition-all shadow-lg"
            wire:loading.attr="disabled">
            <span wire:loading.remove><i class="fas fa-paper-plane"></i> Kirim Pesan</span>
            <span wire:loading><i class="fas fa-spinner fa-spin"></i> Mengirim...</span>
        </button>
    </form>
</div>

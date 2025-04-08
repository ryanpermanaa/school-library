@props(['book'])

<section class="px-5 py-6 rounded-lg bg-[#FBFBFB] w-full h-fit shadow-lg">

    <div class="w-full">
        <form action="" method="POST" wire:submit="submit" class="">
            @csrf
            @method('PUT')

            <div class="flex flex-col md:flex-row gap-5 w-full">
                <div class="space-y-4 flex-1">
                    <div>
                        <label for="book-title" class="text-base font-medium text-gray-900">
                            Judul
                        </label>
                        <div class="mt-2">
                            <input placeholder="Judul dari buku" type="text"
                                class="flex w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50"
                                id="book-title" wire:model="title" required />
                        </div>
                        @error('title')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="book-author" class="text-base font-medium text-gray-900">
                            Penulis
                        </label>
                        <div class="mt-2">
                            <input placeholder="Penulis buku" type="text"
                                class="flex w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50"
                                id="book-author" wire:model="author" required />
                        </div>
                        @error('author')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="book-description" class="text-base font-medium text-gray-900">
                            Deskripsi
                        </label>
                        <div class="mt-2">
                            <textarea placeholder="Deskripsi singkat buku" type="text"
                                class="flex w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50"
                                id="book-description" wire:model="description" rows="6" required></textarea>
                        </div>
                        @error('description')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="space-y-4 flex-1">
                    <div>
                        <label for="book-category" class="text-base font-medium text-gray-900">
                            Kategory
                        </label>
                        <div class="mt-2">
                            <select wire:model="category_id" id="book-category"
                                class="mt-0.5 px-2 py-2 w-full rounded border border-gray-300 shadow-sm sm:text-sm">
                                <option value="">Pilih Kategori</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ ucfirst($category->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="book-image" class="text-base font-medium text-gray-900">
                            Cover Buku
                        </label>
                        <div class="w-full flex items-center gap-4 mt-2">
                            <div class="flex-1">
                                <img src="{{ $old_cover_path }}" class="w-full" alt="">
                            </div>
                            <div class="flex-1/2">
                                <p class="mb-2 italic">Ubah ke file baru:</p>
                                <div
                                    class="relative h-40 rounded-lg border-2 bg-gray-50 flex justify-center items-center shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out">
                                    <div class="absolute inset-3 flex flex-col items-center">

                                        @if (!$cover_path)
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                enable-background="new 0 0 283.465 283.465"
                                                viewBox="0 0 283.465 283.465" width="70" class="mb-2"
                                                id="png-file">
                                                <polygon fill="#C3AFF1" fill-rule="evenodd"
                                                    points="171.886 33.694 58.962 33.694 58.962 264.073 231.001 264.073 231.001 91.412"
                                                    clip-rule="evenodd"></polygon>
                                                <path d="M216.845,252.771H44.539c-0.797,0-1.562-0.317-2.124-0.882c-0.563-0.564-0.878-1.329-0.876-2.127l0.638-230.378
       c0.005-1.653,1.347-2.992,3-2.992h112.81c0.796,0,1.559,0.316,2.121,0.879l59.181,59.18c0.564,0.564,0.881,1.33,0.879,2.127
       l-0.141,70.059c-0.003,1.655-1.346,2.994-3,2.994c-0.002,0-0.004,0-0.006,0c-1.657-0.004-2.997-1.35-2.994-3.006l0.139-68.813
       l-57.421-57.42H48.168l-0.621,224.379h166.307l0.018-6.256c0.005-1.653,1.347-2.991,3-2.991c0.003,0,0.006,0,0.009,0
       c1.656,0.005,2.996,1.352,2.991,3.009l-0.026,9.247C219.84,251.433,218.498,252.771,216.845,252.771z"></path>
                                                <path
                                                    d="M217.167 81.571h-39.781c-12.351 0-22.399-10.048-22.399-22.399V19.392c0-1.213.731-2.307 1.852-2.771 1.125-.465 2.412-.208 3.27.65l59.181 59.18c.858.858 1.115 2.148.65 3.269C219.474 80.84 218.38 81.571 217.167 81.571zM160.986 26.634v32.539c0 9.042 7.356 16.399 16.399 16.399h32.539L160.986 26.634zM235.602 229.796H119.006c-3.486 0-6.322-2.836-6.322-6.322v-57.793c0-3.486 2.836-6.323 6.322-6.323h116.597c3.486 0 6.323 2.837 6.323 6.323v57.793C241.926 226.96 239.089 229.796 235.602 229.796zM119.006 165.357c-.172 0-.322.151-.322.323v57.793c0 .172.15.322.322.322h116.597c.172 0 .323-.15.323-.322v-57.793c0-.172-.151-.323-.323-.323H119.006z">
                                                </path>
                                                <path fill-rule="evenodd" d="M145.188,201.224h-3.445c-0.263,0-0.487,0.092-0.671,0.276
       c-0.184,0.184-0.276,0.408-0.276,0.67v5.878c0,0.263-0.092,0.486-0.276,0.671c-0.184,0.184-0.401,0.276-0.664,0.276h-5.93
       c-0.263,0-0.48-0.092-0.664-0.276c-0.184-0.184-0.276-0.408-0.276-0.671v-26.982c0-0.263,0.092-0.486,0.276-0.67
       c0.184-0.184,0.408-0.276,0.67-0.276h12.071c1.473,0,2.86,0.276,4.162,0.828c1.302,0.552,2.433,1.315,3.393,2.288
       c0.96,0.973,1.722,2.104,2.288,3.393c0.566,1.289,0.848,2.669,0.848,4.142c0,1.473-0.237,2.847-0.71,4.122
       c-0.473,1.275-1.197,2.38-2.156,3.313c-0.96,0.933-2.163,1.67-3.596,2.209C148.791,200.954,147.108,201.224,145.188,201.224
       L145.188,201.224z M145.471,187.378h-3.721c-0.263,0-0.493,0.092-0.677,0.276c-0.184,0.184-0.276,0.401-0.276,0.664v4.628
       c0,0.263,0.092,0.48,0.276,0.664c0.184,0.184,0.414,0.276,0.677,0.276h4.241c1.006,0,1.736-0.322,2.196-0.96
       c0.467-0.644,0.697-1.367,0.697-2.176c0-0.421-0.072-0.828-0.217-1.236c-0.145-0.408-0.361-0.763-0.657-1.078
       c-0.29-0.315-0.644-0.565-1.065-0.762C146.516,187.477,146.03,187.378,145.471,187.378L145.471,187.378z M186.91,181.066v26.982
       c0,0.263-0.092,0.486-0.276,0.671c-0.184,0.184-0.408,0.276-0.671,0.276h-5.825c-0.263,0-0.539-0.079-0.828-0.237
       c-0.29-0.158-0.506-0.342-0.664-0.552l-10.276-14.477c-0.158-0.21-0.322-0.296-0.493-0.256s-0.257,0.191-0.257,0.453v14.122
       c0,0.263-0.092,0.486-0.276,0.671c-0.184,0.184-0.414,0.276-0.677,0.276h-5.904c-0.263,0-0.493-0.092-0.677-0.276
       c-0.184-0.184-0.276-0.408-0.276-0.671v-26.982c0-0.263,0.092-0.486,0.276-0.67c0.184-0.184,0.408-0.276,0.671-0.276h5.917
       c0.263,0,0.539,0.072,0.829,0.217c0.289,0.144,0.513,0.322,0.67,0.533l10.256,14.477c0.158,0.21,0.322,0.302,0.493,0.276
       c0.171-0.026,0.257-0.171,0.257-0.434v-14.122c0-0.263,0.092-0.486,0.276-0.67c0.184-0.184,0.408-0.276,0.671-0.276h5.838
       c0.263,0,0.486,0.092,0.671,0.276C186.818,180.58,186.91,180.804,186.91,181.066L186.91,181.066z M206.712,209.508
       c-2.104,0-4.076-0.395-5.917-1.183c-1.841-0.789-3.452-1.854-4.832-3.195c-1.381-1.341-2.472-2.919-3.274-4.734
       c-0.802-1.814-1.203-3.747-1.203-5.799c0-2.051,0.401-3.984,1.203-5.798c0.802-1.815,1.893-3.399,3.274-4.753
       c1.38-1.354,2.991-2.426,4.832-3.215c1.841-0.789,3.813-1.183,5.917-1.183c2.893,0,5.411,0.592,7.554,1.775
       c2.143,1.183,3.885,2.814,5.227,4.891c0.132,0.21,0.164,0.454,0.099,0.73c-0.066,0.276-0.204,0.48-0.414,0.611l-4.734,3.037
       c-0.21,0.132-0.447,0.177-0.71,0.138c-0.263-0.039-0.486-0.164-0.671-0.375c-0.815-0.999-1.729-1.801-2.741-2.406
       c-1.013-0.605-2.216-0.907-3.609-0.907c-1,0-1.939,0.204-2.821,0.612c-0.881,0.408-1.65,0.953-2.308,1.637
       c-0.657,0.684-1.177,1.479-1.558,2.387c-0.381,0.907-0.572,1.847-0.572,2.82c0,0.999,0.191,1.946,0.572,2.84
       c0.381,0.894,0.901,1.677,1.558,2.347c0.657,0.671,1.427,1.21,2.308,1.618c0.881,0.408,1.821,0.611,2.821,0.611
       c0.999,0,1.985-0.184,2.958-0.552c0.973-0.368,1.749-0.973,2.328-1.815c0.132-0.21,0.145-0.401,0.039-0.572
       c-0.105-0.171-0.289-0.257-0.552-0.257h-4.536c-0.263,0-0.487-0.092-0.671-0.276c-0.184-0.184-0.276-0.408-0.276-0.671v-4.694
       c0-0.263,0.092-0.487,0.276-0.67c0.184-0.184,0.408-0.276,0.671-0.276h13.569c0.263,0,0.493,0.086,0.69,0.257
       c0.197,0.171,0.309,0.401,0.335,0.69c0.053,0.447,0.079,0.993,0.079,1.637s-0.04,1.308-0.118,1.992
       c-0.184,1.814-0.697,3.498-1.538,5.049c-0.842,1.552-1.926,2.893-3.255,4.023c-1.328,1.131-2.847,2.019-4.556,2.663
       C210.446,209.186,208.632,209.508,206.712,209.508z" clip-rule="evenodd"></path>
                                            </svg>

                                            <span class="block text-gray-500 font-semibold">
                                                Drag &amp; Drop gambar disini
                                            </span>
                                            <span class="block text-gray-400 font-normal mt-0.5">
                                                Atau klik untuk upload
                                            </span>
                                        @else
                                            <img src="{{ $cover_path }}" alt="" class="w-20 shadow-3xl">
                                        @endif

                                        <div wire:loading wire:target="cover_path" class="absolute inset-0 bg-gray-50">
                                            <div
                                                class="absolute left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 w-10 h-10 border-4 border-t-primary border-gray-300 rounded-full animate-spin">
                                            </div>
                                        </div>

                                    </div>

                                    <input wire:model="cover_path" id="book-image" accept="image/png, image/jpeg"
                                        class="h-full w-full opacity-0 cursor-pointer" type="file" />
                                </div>
                            </div>
                            @error('cover_path')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <flux:button type="submit"
                            class="w-full h-fit! py-2.5 rounded-md bg-primary! text-custom-white! text-lg font-semibold hover:bg-[#593B9D]! transition cursor-pointer select-none">
                            Konfirmasi Edit Buku
                        </flux:button>
                    </div>
                </div>
            </div>
        </form>
    </div>


</section>

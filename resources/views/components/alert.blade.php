@props(['model'])

<div x-data="{ hideAlert: false, result: @entangle($model) }" x-init="if (result !== null) {
    setTimeout(() => hideAlert = true, 10000);
}
$watch('result', val => {
    if (val !== null) {
        hideAlert = false;
        setTimeout(() => hideAlert = true, 10000);
    }
})" class="shadow-xl">

    <div x-cloak x-show="result !== null">
        {{ $slot }}
    </div>

</div>

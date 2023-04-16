@props(['message'])
<div
    x-data="{
        visible: true,
        timeout: 5000,

        init() {
            setTimeout(() => {
                this.visible = false;
            }, this.timeout);
        }
    }"
    x-show="visible"
    class="relative flex items-center justify-center w-full"
>
    <div class="absolute top-3 bg-red-500 rounded-md py-2.5 px-4 z-50 ">
        <span class="font-medium text-white"> {{ $message }}</span>
    </div>
</div>

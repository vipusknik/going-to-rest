<div class="flex flex-col border-b border-dotted border-teal-dark py-2 md:hidden">
    <div class="flex mb-4">
        <div class="w-1/2 flex items-center mr-2">
            <div class="w-8 h-8 mr-3">
                <a href="{{ $model->site_link }}">
                    <img src="/images/icons/www.png" alt="address" class="block">
                </a>
            </div>

            <div class="flex-1">
                <a href="{{ $model->site_link }}" class="block text-black">{{ base_url($model->site_link) }}</a>
            </div>
        </div>

        <div class="w-1/2 flex items-center">
            <div class="w-8 h-8 mr-3">
                <a href="{{ $model->socialMedia()->instagram }}">
                    <img src="/images/icons/instagram.png" alt="address" class="block">
                </a>
            </div>

            <div class="flex-1">
                <a href="{{ $model->socialMedia()->instagram }}" class="block text-black">{{ base_url($model->socialMedia()->instagram) }}</a>
            </div>
        </div>
    </div>

    <div class="flex">
        <div class="w-1/2 flex items-center mr-2">
            <div class="w-8 h-8 mr-3">
                <a href="{{ $model->socialMedia()->facebook }}">
                    <img src="/images/icons/facebook.png" alt="address" class="block">
                </a>
            </div>

            <div class="flex-1">
                <a href="{{ $model->socialMedia()->facebook }}" class="block text-black">{{ base_url($model->socialMedia()->facebook) }}</a>
            </div>
        </div>

        <div class="w-1/2 flex items-center">
            <div class="w-8 h-8 mr-3">
                <a href="{{ $model->socialMedia()->vk }}">
                    <img src="/images/icons/vk.png" alt="address" class="block">
                </a>
            </div>

            <div class="flex-1">
                <a href="{{ $model->socialMedia()->vk }}" class="block text-black">{{ base_url($model->socialMedia()->vk) }}</a>
            </div>
        </div>
    </div>
</div>

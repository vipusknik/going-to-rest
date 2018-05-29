<div class="flex flex-col border-b border-dotted border-teal-dark py-2 md:hidden">
    <div class="flex mb-4">
        <div class="w-1/2 flex items-center mr-2">
            <div class="w-8 h-8 mr-3">
                <a href="{{ $model->site_link }}" target="_blank">
                    <img src="/images/icons/www.png" alt="address" class="block">
                </a>
            </div>

            <div class="flex-1">
                <a href="{{ $model->site_link }}" class="block text-black" target="_blank">{{ str_limit(base_url($model->site_link), 14, '') }}</a>
            </div>
        </div>

        <div class="w-1/2 flex items-center">
            <div class="w-8 h-8 mr-3">
                <a href="{{ $model->socialMedia()->instagram }}" target="_blank">
                    <img src="/images/icons/instagram.png" alt="address" class="block">
                </a>
            </div>

            <div class="flex-1">
                <a href="{{ $model->socialMedia()->instagram }}" class="block text-black" target="_blank">{{ str_limit(base_url($model->socialMedia()->instagram), 14, '') }}</a>
            </div>
        </div>
    </div>

    <div class="flex">
        <div class="w-1/2 flex items-center mr-2">
            <div class="w-8 h-8 mr-3">
                <a href="{{ $model->socialMedia()->facebook }}" target="_blank">
                    <img src="/images/icons/facebook.png" alt="address" class="block">
                </a>
            </div>

            <div class="flex-1">
                <a href="{{ $model->socialMedia()->facebook }}" class="block text-black" target="_blank">{{ str_limit(base_url($model->socialMedia()->facebook), 14, '') }}</a>
            </div>
        </div>

        <div class="w-1/2 flex items-center">
            <div class="w-8 h-8 mr-3">
                <a href="{{ $model->socialMedia()->vk }}" target="_blank">
                    <img src="/images/icons/vk.png" alt="address" class="block">
                </a>
            </div>

            <div class="flex-1">
                <a href="{{ $model->socialMedia()->vk }}" class="block text-black" target="_blank">{{ str_limit(base_url($model->socialMedia()->vk), 14, '') }}</a>
            </div>
        </div>
    </div>
</div>

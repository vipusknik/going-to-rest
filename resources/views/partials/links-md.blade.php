<div class="hidden md:flex md:border-b-2 md:border-dotted md:border-teal-dark md:py-2 md:mx-3 lg:flex-row">
    <div class="flex items-center w-1/4 mr-2">
        <div class="w-8 h-8 flex-no-shrink mr-3">
            <a href="{{ $model->site_link }}" target="_blank">
                <img src="/images/icons/www.png" alt="address" class="block">
            </a>
        </div>

        <div class="flex-1 break-words min-w-0">
            <a href="{{ $model->site_link }}" class="block text-black" target="_blank">{{ str_limit(base_url($model->site_link), 10, '') }}</a>
        </div>
    </div>

    <div class="flex items-center w-1/4 mr-2">
        <div class="w-8 h-8 flex-no-shrink mr-3">
            <a href="{{ $model->socialMedia()->instagram }}" target="_blank">
                <img src="/images/icons/instagram.png" alt="address" class="block">
            </a>
        </div>

        <div class="flex-1 break-words min-w-0">
            <a href="{{ $model->socialMedia()->instagram }}" class="block text-black" target="_blank">{{ str_limit(base_url($model->socialMedia()->instagram), 10, '') }}</a>
        </div>
    </div>

    <div class="flex items-center w-1/4 mr-2">
        <div class="w-8 h-8 flex-no-shrink mr-3">
            <a href="{{ $model->socialMedia()->facebook }}" target="_blank">
                <img src="/images/icons/facebook.png" alt="address" class="block">
            </a>
        </div>

        <div class="flex-1 break-words min-w-0">
            <a href="{{ $model->socialMedia()->facebook }}" class="block text-black" target="_blank">{{ str_limit(base_url($model->socialMedia()->facebook), 10, '') }}</a>
        </div>
    </div>

    <div class="flex items-center w-1/4">
        <div class="w-8 h-8 flex-no-shrink mr-3">
            <a href="{{ $model->socialMedia()->vk }}" target="_blank">
                <img src="/images/icons/vk.png" alt="address" class="block">
            </a>
        </div>

        <div class="flex-1 break-words min-w-0">
            <a href="{{ $model->socialMedia()->vk }}" class="block text-black" target="_blank">{{ str_limit(base_url($model->socialMedia()->vk), 10, '') }}</a>
        </div>
    </div>
</div>

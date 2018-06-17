<div class="hidden md:flex md:border-b-2 md:border-dotted md:border-teal-dark md:py-2 md:mx-3 lg:flex-row">
    @if ($model->site_link)
        <div class="flex items-center w-1/4 mr-2">
            <div class="w-8 h-8 flex-no-shrink mr-3">
                <a href="{{ $model->site_link }}" target="_blank">
                    <img src="/images/icons/www.png" alt="address" class="block">
                </a>
            </div>

            <div class="flex-1 break-words min-w-0">
                <a href="{{ $model->site_link }}" class="block text-black underline hover:text-teal-dark" target="_blank">сайт</a>
            </div>
        </div>
    @endif

    @if ($model->socialMedia()->instagram)
        <div class="flex items-center w-1/4 mr-2">
            <div class="w-8 h-8 flex-no-shrink mr-3">
                <a href="{{ $model->socialMedia()->instagram['link'] }}" target="_blank">
                    <img src="/images/icons/instagram.png" alt="address" class="block">
                </a>
            </div>

            <div class="flex-1 break-words min-w-0">
                <a href="{{ $model->socialMedia()->instagram['link'] }}" class="block text-black underline hover:text-teal-dark" target="_blank">
                    {{ str_limit(base_url($model->socialMedia()->instagram['link_placeholder'] ?? $model->socialMedia()->instagram['link']), 10, '') }}
                </a>
            </div>
        </div>
    @endif

    @if ($model->socialMedia()->facebook)
        <div class="flex items-center w-1/4 mr-2">
            <div class="w-8 h-8 flex-no-shrink mr-3">
                <a href="{{ $model->socialMedia()->facebook['link'] }}" target="_blank">
                    <img src="/images/icons/facebook.png" alt="address" class="block">
                </a>
            </div>

            <div class="flex-1 break-words min-w-0">
                <a href="{{ $model->socialMedia()->facebook['link'] }}" class="block text-black underline hover:text-teal-dark" target="_blank">
                    {{ str_limit(base_url($model->socialMedia()->facebook['link_placeholder'] ?? $model->socialMedia()->facebook['link']), 10, '') }}
                </a>
            </div>
        </div>
    @endif

    @if ($model->socialMedia()->vk)
        <div class="flex items-center w-1/4">
            <div class="w-8 h-8 flex-no-shrink mr-3">
                <a href="{{ $model->socialMedia()->vk['link'] }}" target="_blank">
                    <img src="/images/icons/vk.png" alt="address" class="block">
                </a>
            </div>

            <div class="flex-1 break-words min-w-0">
                <a href="{{ $model->socialMedia()->vk['link'] }}" class="block text-black underline hover:text-teal-dark" target="_blank">
                    {{ str_limit(base_url($model->socialMedia()->vk['link_placeholder'] ?? $model->socialMedia()->vk['link']), 10, '') }}
                </a>
            </div>
        </div>
    @endif
</div>

<div class="flex flex-col border-b border-dotted border-teal-dark py-2 md:hidden">
    <div class="flex flex-wrap">
        @if ($model->site_link)
            <div class="w-1/2 flex items-center pr-2 mb-4">
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
            <div class="w-1/2 flex items-center pr-2 mb-4">
                <div class="w-8 h-8 flex-no-shrink mr-3">
                    <a href="{{ $model->socialMedia()->instagram['link'] }}" target="_blank">
                        <img src="/images/icons/instagram.png" alt="address" class="block">
                    </a>
                </div>

                <div class="flex-1 break-words min-w-0">
                    <a href="{{ $model->socialMedia()->instagram['link'] }}" class="block text-black underline hover:text-teal-dark" target="_blank">
                        {{ str_limit(base_url($model->socialMedia()->instagram['link_placeholder'] ?? $model->socialMedia()->instagram['link']), 14, '') }}
                    </a>
                </div>
            </div>
        @endif

        @if ($model->socialMedia()->facebook)
            <div class="w-1/2 flex items-center pr-2 mb-4">
                <div class="w-8 h-8 flex-no-shrink mr-3">
                    <a href="{{ $model->socialMedia()->facebook['link'] }}" target="_blank">
                        <img src="/images/icons/facebook.png" alt="address" class="block">
                    </a>
                </div>

                <div class="flex-1 break-words min-w-0">
                    <a href="{{ $model->socialMedia()->facebook['link'] }}" class="block text-black underline hover:text-teal-dark" target="_blank">
                        {{ str_limit(base_url($model->socialMedia()->facebook['link_placeholder'] ?? $model->socialMedia()->facebook['link']), 14, '') }}
                    </a>
                </div>
            </div>
        @endif

        @if ($model->socialMedia()->vk)
            <div class="w-1/2 flex items-center pr-2 mb-4">
                <div class="w-8 h-8 flex-no-shrink mr-3">
                    <a href="{{ $model->socialMedia()->vk['link'] }}" target="_blank">
                        <img src="/images/icons/vk.png" alt="address" class="block">
                    </a>
                </div>

                <div class="flex-1 break-words min-w-0">
                    <a href="{{ $model->socialMedia()->vk['link'] }}" class="block text-black underline hover:text-teal-dark" target="_blank">
                        {{ str_limit(base_url($model->socialMedia()->vk['link_placeholder'] ?? $model->socialMedia()->vk['link']), 14, '') }}
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

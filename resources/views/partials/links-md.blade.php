<div class="hidden md:flex md:border-b-2 md:border-dotted md:border-teal-dark md:py-2 md:mx-3 lg:flex-row">
    <div class="flex items-center w-1/4 mr-2">
        <div class="w-8 h-8 mr-3">
            <a href="{{ $model->site_link }}">
                <img src="/images/icons/www.png" alt="address" class="block">
            </a>
        </div>

        <div class="flex-1">
            <a href="{{ $model->site_link }}" class="block text-black">{{ base_url($model->site_link . '/oashdauk') }}</a>
        </div>
    </div>

    <div class="flex items-center w-1/4 mr-2">
        <div class="w-8 h-8 mr-3">
            <a href="{{ $model->socialMedia()->instagram }}">
                <img src="/images/icons/instagram.png" alt="address" class="block">
            </a>
        </div>

        <div class="flex-1">
            <a href="{{ $model->socialMedia()->instagram }}" class="block text-black">{{ base_url($model->socialMedia()->instagram) }}</a>
        </div>
    </div>

    <div class="flex items-center w-1/4 mr-2">
        <div class="w-8 h-8 mr-3">
            <a href="{{ $model->socialMedia()->facebook }}">
                <img src="/images/icons/facebook.png" alt="address" class="block">
            </a>
        </div>

        <div class="flex-1">
            <a href="{{ $model->socialMedia()->facebook }}" class="block text-black">{{ base_url($model->socialMedia()->facebook) }}</a>
        </div>
    </div>

    <div class="flex items-center w-1/4">
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

<div>
    <div class="flex">
      <div class="field w-1/3 mr-3">
        <label class="label">
          Вконтакте
        </label>

        <div class="control">
          <input class="input"
                 type="text"
                 name="social_media[vk][link]"
                 value="{{ old('social_media.vk.link', optional($socialMedia)->vk['link']) }}"
                 placeholder="Вконтакте ссылка">
        </div>
      </div>

      <div class="field w-1/3 mr-3">
        <label class="label">Instagram</label>

        <div class="control">
          <input class="input"
                 type="text"
                 name="social_media[instagram][link]"
                 value="{{ old('social_media.instagram.link', optional($socialMedia)->instagram['link']) }}"
                 placeholder="Instagram ссылка">
        </div>
      </div>

      <div class="field w-1/3">
        <label class="label">Facebook</label>

        <div class="control">
          <input class="input"
                 type="text"
                 name="social_media[facebook][link]"
                 value="{{ old('social_media.facebook.link', optional($socialMedia)->facebook['link']) }}"
                 placeholder="Facebook ссылка">
        </div>
      </div>
    </div>

    <div class="flex">
      <div class="field w-1/3 mr-3">
        <div class="control">
          <input class="input"
                 type="text"
                 name="social_media[vk][link_placeholder]"
                 value="{{ old('social_media.vk.link_placeholder', optional($socialMedia)->vk['link_placeholder']) }}"
                 placeholder="Вконтакте текст ссылки">
        </div>
      </div>

      <div class="field w-1/3 mr-3">
        <div class="control">
          <input class="input"
                 type="text"
                 name="social_media[instagram][link_placeholder]"
                 value="{{ old('social_media.instagram.link_placeholder', optional($socialMedia)->instagram['link_placeholder']) }}"
                 placeholder="Instagram текст ссылки">
        </div>
      </div>

      <div class="field w-1/3">
        <div class="control">
          <input class="input"
                 type="text"
                 name="social_media[facebook][link_placeholder]"
                 value="{{ old('social_media.facebook.link_placeholder', optional($socialMedia)->facebook['link_placeholder']) }}"
                 placeholder="Facebook текст ссылки">
        </div>
      </div>
    </div>
</div>

<div>
    <div class="flex">
      <div class="field w-1/3 mr-3">
        <label class="label">
          Вконтакте
        </label>

        <div class="control">
          <input class="input"
                 type="text"
                 name="social_media[vk]"
                 value="{{ old('social_media.vk', optional($socialMedia)->vk) }}"
                 placeholder="Вконтакте">
        </div>
      </div>

      <div class="field w-1/3 mr-3">
        <label class="label">Instagram</label>

        <div class="control">
          <input class="input"
                 type="text"
                 name="social_media[instagram]"
                 value="{{ old('social_media.instagram', optional($socialMedia)->instagram) }}"
                 placeholder="Instagram">
        </div>
      </div>

      <div class="field w-1/3">
        <label class="label">Facebook</label>

        <div class="control">
          <input class="input"
                 type="text"
                 name="social_media[facebook]"
                 value="{{ old('social_media.facebook', optional($socialMedia)->facebook) }}"
                 placeholder="Facebook">
        </div>
      </div>
    </div>
</div>

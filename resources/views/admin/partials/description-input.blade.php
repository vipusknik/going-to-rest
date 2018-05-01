<div class="field">
  <label class="label">Описание</label>
  <div class="control">
    <wysiwig name="description"
             value="{{ old('description', optional($model)->description) }}"
             placeholder="Описание">
    </wysiwig>
  </div>
</div>

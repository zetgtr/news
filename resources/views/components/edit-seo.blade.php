<div class="tab-pane" id="seo" role="tabpanel">
    <div class="form-group">
        <div class="form-group">
            <label for="url">Seo url</label>
            <input id="url" name="url" class="form-control @error('url') is-invalid @enderror" type="text" value="{{ old('url') ? old('url') : $news->url }}">
            <x-error error-value="url" />
        </div>
        <div class="form-group">
            <label for="seoTitle">Seo title</label>
            <input id="seoTitle" name="seoTitle" class="form-control @error('seoTitle') is-invalid @enderror" type="text" value="{{ old('seoTitle') ? old('seoTitle') : $news->seoTitle }}">
            <x-error error-value="seoTitle" />
        </div>
        <div class="form-group">
            <label for="seoKeywords">Seo keywords</label>
            <input id="seoKeywords" name="seoKeywords" class="form-control @error('seoKeywords') is-invalid @enderror" type="text" value="{{ old('seoKeywords') ? old('seoKeywords') : $news->seoKeywords }}">
            <x-error error-value="seoKeywords" />
        </div>
        <div class="form-group">
            <label for="seoDescription">Seo description</label>
            <textarea name="seoDescription" id="seoDescription" rows="5" class="form-control @error('seoDescription') is-invalid @enderror">{{ old('seoDescription') ? old('seoDescription') : $news->seoDescription }}</textarea>
            <x-error error-value="seoDescription" />
        </div>
    </div>
</div>

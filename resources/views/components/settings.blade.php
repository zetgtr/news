<div class="card-header card-header-divider">
    <div>
        <h4>Настройки</h4>
    </div>
</div>
<div class="card-body">
    <form action="{{ route('admin.news.settings.update', ['setting'=>$settings]) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $settings->id }}">
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        @if (session('success'))
            <x-alert type="success" :message="session('success')"></x-alert>
        @endif
        <div class="tab-pane fade show active" id="news-content" role="tabpanel" aria-labelledby="news-content-tab">
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ? old('title') : $settings->title }}">
                <x-error error-value="title" />
            </div>
            <div class="form-group">
                <label for="url">Url</label>
                <input type="text" name="url" id="url" class="form-control @error('url') is-invalid @enderror" value="{{ old('url') ? old('url') : $settings->url }}">
                <x-error error-value="url" />
            </div>
            <div class="form-group">
                <label for="seoTitle">SEO Title</label>
                <input type="text" name="seoTitle" id="seoTitle" class="form-control @error('seoTitle') is-invalid @enderror" value="{{ old('seoTitle') ? old('seoTitle') : $settings->seoTitle }}">
                <x-error error-value="seoTitle" />
            </div>
            <div class="form-group">
                <label for="seoKeywords">SEO Keywords</label>
                <input type="text" name="seoKeywords" id="seoKeywords" class="form-control @error('seoKeywords') is-invalid @enderror" value="{{ old('seoKeywords') ? old('seoKeywords') : $settings->seoKeywords }}">
                <x-error error-value="seoKeywords" />
            </div>
            <div class="form-group">
                <label for="seoDescription">SEO Description</label>
                <textarea name="seoDescription" id="seoDescription" rows="5" class="form-control @error('seoDescription') is-invalid @enderror">{{ old('seoDescription') ? old('seoDescription') : $settings->seoDescription }}</textarea>
                <x-error error-value="seoDescription" />
            </div>
        </div>
        <button type="submit" name="save" class="btn btn-sm btn-success">Сохранить</button>
    </form>
</div>

<div class="tab-pane active" id="content" role="tabpanel">
    <input type="hidden" name="id" value="{{ $news->id }}" />
    <div class="row">
        <div class="col-lg-7">
            <div class="form-grop mb-3">
                <label for="title">Заголовок</label>
                <input id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ? old('title') : $news->title }}" />
                <x-error error-value="title" />
            </div>
            <div class="form-group mb-3">
                <label for="my-editor" >Описание</label>
                <textarea name="description" id="my-editor" class="form-control @error('description') is-invalid @enderror my-editor">{{ old('description') ? old('description') : $news->description }}</textarea>
                <x-error error-value="description" />
            </div>
            <div class="form-group mb-3">
                <label for="content" >Контент</label>
                <textarea name="content" id="my-editor" class="form-control @error('content') is-invalid @enderror my-editor">{{ old('content') ? old('content') : $news->content }}</textarea>
                <x-error error-value="content" />
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                <label for="category">Категория</label>
                <select name="category_id" id="category" class="form-select">
                    @foreach($categories as $category)
                        <option @if($categoryNews === $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="access">Доступ</label>
                <select name="access" class="form-control @error('access') is-invalid @enderror form-select">
                    <option value="0" selected="selected">Общий</option>
                    @foreach($roles as $role)
                        <option @selected(old('access') === $role->id || $news->access === $role->id ) value="{{ $news->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                <x-error error-value="access" />
            </div>
            <div class="form-group" style="position:relative;">
                <label for="date_news">Дата публикации (необязательно):</label>
                <input type="text" data-language="ru" name="created_at" id="addDates" class="form-control @error('created_at') is-invalid @enderror" value="{{ old('created_at') ? old('created_at') : $news->created_at->format('d.m.Y H:i') }}">
            </div>
            <div class="form-group ">
                <label for="">Изображения</label>
                <div class="input-group">
                    <span class="input-group-btn">
                      <input id="thumbnail" class="form-control" type="file" name="img[]" multiple value="">
                    </span>
                    <x-error error-value="img" />
                </div>
                <div class="pb-0 mt-3">
                    <ul id="lightgallery" class="list-unstyled row">
                        @if(old("images"))
                            @foreach(explode(",",  implode(",", old("images", []))) as $image)
                                <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0"
                                    data-responsive="{{$image}}"
                                    data-src="{{$image}}">
                                    <a href="javascript:void(0)">
                                        <img class="img-responsive br-5" src="{{$image}}" alt="Thumb-1">
                                    </a>
                                </li>
                            @endforeach
                        @else
                            @foreach(explode(",",  implode(",",$news->images)) as $image)
                                @if($image !== "")
                                    <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0"
                                        data-responsive="{{$image}}"
                                        data-src="{{$image}}">
                                        <a href="javascript:void(0)">
                                            <img class="img-responsive br-5" src="{{$image}}" alt="Thumb-1">
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<template id="template-gallery">
    <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0">
        <a href="javascript:void(0)">
            <img class="img-responsive br-5" alt="Thumb-1">
        </a>
    </li>
</template>

<script src="{{ asset('assets/plugins/gallery/lightgallery.js') }}"></script>
<script src="{{ asset('assets/plugins/gallery/lightgallery-1.js') }}"></script>
<script src="{{ asset('assets/js/admin/lfm.js') }}"></script>
<script>
    $('#lfm').filemanager('image', {
        multiple: true,
        prefix: '/laravel-filemanager',
        defaultValue: '{{ implode(",", old("images", [])) }}'
    });
</script>

@vite('resources/js/utils/AirDatepicker.js')

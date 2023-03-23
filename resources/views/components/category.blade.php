<div class="card-header card-header-divider">
    <div>
        <h4>Категории новостей</h4>
    </div>
</div>
<div class="card-body">
    <form method="post" action="{{ route('admin.news.category.store') }}" class="row form-category">
        @csrf
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-lg-6">
            <h5 class="news-category-title">Добавление категории</h5>
            <br>
            <div class="form-group">
                <label class="form-label" for="name">Название</label>
                <input type="text" value="{{old('name')}}" name="name" class="form-control news-category-name @error('name') is-invalid @enderror">
                <x-error error-value="name" />
            </div>
            <div class="form-group">
                <label class="form-label" for="url">URL</label>
                <input type="text" value="{{old('url')}}" name="url" class="form-control news-category-url @error('url') is-invalid @enderror">
                <x-error error-value="url" />
            </div>
            <button type="submit" name="save" class="btn btn-sm btn-success">Сохранить</button>
            <button type="submit" name="save" class="btn btn-sm d-none close-category-edit btn-danger">Отменить</button>
        </div>
        <div class="col-lg-6">
            <h5 class="mb-5">Список категорий</h5>
            <br>
            <div class="row">
                <ul class="list-group">
                    @forelse($categories as $category)
                        <li class="list-group-item d-flex align-items-center justify-content-between delete-element">
                            {{ $category->name }}
                            <div class="btn-group align-top">
                                <a href="{{ route('admin.news.category.edit',['category'=>$category]) }}" class="btn btn-sm btn-primary edit badge"
                                   data-target="#user-form-modal" data-bs-toggle="" type="button">Редактировать</a>
                                <a href="{{ route('admin.news.category.destroy',['category'=>$category]) }}" class="btn delete btn-sm btn-primary badge" type="button">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </li>
                    @empty
                        <div class="w-100 text-center">
                            Записей нет
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
    </form>
</div>
<script src="{{ asset('assets/js/admin/news/script.js') }}"></script>
<script src="{{ asset('assets/js/admin/delete.js') }}"></script>

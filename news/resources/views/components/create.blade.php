<div class="card-header card-header-divider">
    <div>
        <h4>Создание новости</h4>
        <span class="card-header-subtitle">Заполните необходимые поля и сохраните новость.</span>
    </div>
</div>
<x-admin.navigatin-js :links="$links" />
<div class="card-body">
    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="tab-content">
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
        <x-news::content />
        <x-news::seo />
        <button type="submit" name="save" class="btn btn-sm btn-success">Сохранить</button>
    </form>
</div>


<div class="card-header card-header-divider">
    <div>
        <h4>Редактирование новости</h4>
        <span class="card-header-subtitle">Заполните необходимые поля и сохраните новость.</span>
    </div>
</div>
<x-admin.navigatin-js :links="$links" />
<div class="card-body">
    <form action="{{ route('admin.news.update',['news'=>$news]) }}" method="POST" class="tab-content">
        @csrf
        @method('PUT')
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
        <x-admin.news.edit-content :news="$news" />
        <x-admin.news.edit-seo :news="$news" />
        <button type="submit" name="save" class="btn btn-sm btn-success">Сохранить</button>
    </form>
</div>


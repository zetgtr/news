<div class="card-header card-header-divider">
    <div>
        <h4>Список новостей</h4>
    </div>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table id="example2" class="table table-bordered text-nowrap border-bottom">
            <thead>
            <tr>
                <th class="border-bottom-0 text-center">Заголовок</th>
                <th class="border-bottom-0 text-center">Дата создания</th>
                <th class="border-bottom-0 text-center">Просмотры</th>
                <th class="border-bottom-0 text-center">Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($newsList as $news)
                <tr class="delete-element">
                    <td>{{ $news->title }}</td>
                    <td class="text-center">{{ $news->created_at->format('d.m.Y H:i') }}</td>
                    <td class="text-center">{{ $news->show }}</td>
                    <td class="text-center btn-list-table">
                        <a href="{{ route('admin.news.edit', ['news'=>$news]) }}" class="btn btn-secondary">
                            <i class="fal fa-pencil-alt"></i>
                        </a>
                        <a href="{{ route('admin.news.destroy', ['news'=>$news]) }}" class="btn btn-danger delete">
                            <i class="far fa-trash-alt"></i>
                        </a>
                        @if($news->publish)
                            <a href="{{ route('admin.news.show', ['news'=>$news]) }}" class="btn btn-success show-publish">
                                <i class="far fa-eye"></i>
                            </a>
                        @else
                            <a href="{{ route('admin.news.show', ['news'=>$news]) }}" class="btn btn-default show-publish">
                                <i class="far fa-eye-slash"></i>
                            </a>
                        @endif

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
<script src="{{ asset('assets/js/table-data.js')}}"></script>
<script src="{{ asset('assets/js/admin/delete.js') }}"></script>
<script src="{{ asset('assets/js/admin/show.js') }}"></script>

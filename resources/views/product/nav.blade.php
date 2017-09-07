<ul class="nav nav-tabs" style="margin-bottom: 10px;">
    <li class="nav-item">
        <a class="nav-link {{ $data['subNav'] === 'addEdit'?'active':'' }}" href="{{ route('product.create') }}">新增&编辑</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $data['subNav'] === 'list'?'active':'' }}" href="{{ route('product.index') }}">列表</a>
    </li>
</ul>
<nav class="d-flex justify-content-start align-items-center container">
    <h2 class="me-3">Admin's Office:</h2>
    <ul class="d-flex justify-content-between align-items-center">
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'admin.products.index' ? 'active' : '' }}"
                href="{{ route('admin.products.index') }}">Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}"
                href="{{ route('admin.categories.index') }}">Categories</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'admin.colors.index' ? 'active' : '' }}"
                href="{{ route('admin.colors.index') }}">Colors</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'admin.textures.index' ? 'active' : '' }}"
                href="{{ route('admin.textures.index') }}">Textures</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'admin.brands.index' ? 'active' : '' }}"
                href="{{ route('admin.brands.index') }}">Brands</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'admin.tags.index' ? 'active' : '' }}"
                href="{{ route('admin.tags.index') }}">Tags</a>
        </li>
    </ul>
</nav>

<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="{{ $menuIcon }} fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </span>
        <span class="menu-title">{{ $menuTitle }}</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion">
        @foreach ($menuItems as $item)
        <div class="menu-item">
            <a class="menu-link" href="{{ $item['url'] }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">{{ $item['title'] }}</span>
            </a>
        </div>
        @endforeach
    </div>
</div>

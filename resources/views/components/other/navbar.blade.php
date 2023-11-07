<!-- Sidebar-->
<div class="border-end app-bg-secondary" id="sidebar-wrapper" style="height: 100vh">
    <div class="sidebar-heading border-bottom app-bg-secondary">
        Tabloid Pendi.Indo
    </div>
    <div class="list-group list-group-flush app-bg-secondary">
        @forelse ($kabupaten as $item)
            <a class="list-group-item list-group-item-action list-group-item-light p-3 app-bg-secondary" href="#!">
                {{ $item->nama_kabupaten }}
            </a>
        @empty
        @endforelse
    </div>
</div>

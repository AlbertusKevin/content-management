<div class="row mt-4">
    <div class="col-md-12">
        <h5 class="d-inline-block align-middle">{{ $module }}</h5>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                @foreach ($bread_crumb as $nav => $link)
                    @if (end($bread_crumb) == $link)
                        <li class="breadcrumb-item" aria-current="page" class="active"><a
                                href={{ $link }}>{{ $nav }}</a></li>
                    @else
                        <li class="breadcrumb-item"><a href={{ $link }}>{{ $nav }}</a></li>
                    @endif
                @endforeach
            </ol>
        </nav>
    </div>
</div>

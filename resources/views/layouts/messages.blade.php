@if (isset($errors) && count($errors) > 0)
    <ul class="alert alert-danger list-unstyled">
        @foreach ($errors->all() as $error)
            <li class="fs-6">{{ $error }}</li>
        @endforeach
    </ul>
@endif

@if (Session::get('success', false))
    @php $data = Session::get('success'); @endphp

    @if (is_array($data))
        @foreach ($data as $message)
            <div class="alert alert-success">
                <i class="fa fa-check"></i>
                {{ $message }}
            </div>
        @endforeach
    @endif
@endif

<button @if ($type) type="{{ $type }}" @endif
    @if ($name) name="{{ $name }}" @endif
    @if ($class) class="btn {{ $class }}" @endif
    @if ($id) id="{{ $id }}" @endif
    @if ($value) value="{{ $value }}" @endif
    @if ($onclick) onclick="{{ $onclick }}" @endif
    @if ($form) form="{{ $form }}" @endif
    @if ($disabled) disabled @endif
    @if ($data_target) data-target="{{ $data_target }}" @endif
    @if ($data_toggle) data-toggle="{{ $data_toggle }}" @endif
    @if ($data_dismiss) data-dismiss="{{ $data_dismiss }}" @endif
    @if ($data_bs_toggle) data-bs-toggle="{{ $data_bs_toggle }}" @endif
    @foreach ($data as $key => $value) data-{{ $key }}="{{ $value }}" @endforeach
    @if($addition){{ $addition }} @endif>
    {{ $text }}
</button>

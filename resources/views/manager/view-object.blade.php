@role('admin')
<div class="container-fluid">
    <div class="accordion" id="accordionScroll">
        <div class="row">
            <div class="col-xl-12 mb-3">
                <div class="card bg-secondary shadow mb-0">
                    <div class="card-header bg-white border-0" id="heading0" data-toggle="collapse"
                         data-target="#collapse0" aria-expanded="true" aria-controls="collapse0">
                        <div class="row align-items-center">
                            <h3 class="mb-0 ml-3">{{ __('Thông tin chung') }}</h3>
                        </div>
                    </div>
                    <div id="collapse0" class="collapsed" aria-labelledby="heading0" data-parent="#accordionScroll">
                        <div class="card-body">
                            <h6 class="heading-small text-muted mb-4">{{ __('Đối tượng') }}</h6>
                            <div class="pl-lg-4">
                                @isset($object)
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-id">{{ __('ID') }}</label>
                                        <input type="text" id="input-id" name="id"
                                               class="form-control form-control-alternative"
                                               placeholder="{{ __('ID') }}"
                                               value="{{ old('id', $object->id ?? "") }}" readonly/>
                                    </div>
                                @endisset
                                <div class="form-group">
                                    <label class="form-control-label" for="input-name">{{ __('Tên đối tượng') }}</label>
                                    <input type="text" id="input-name" name="name"
                                           class="form-control form-control-alternative"
                                           placeholder="{{ __('Tên') }}"
                                           value="{{ old('name', $object->name ?? "") }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="titleSelected">{{ __('Danh hiệu liên kết') }}</label>
                                    <select id="selected" class="custom-select form-control form-control-alternative" id="titleSelected" name="id_title[]" multiple="multiple" required>
                                        {!! $listTitle ?? "" !!}
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#selected').select2();
</script>
@endrole

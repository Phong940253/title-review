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
                            <h6 class="heading-small text-muted mb-4">{{ __('Danh hiệu') }}</h6>
                            <div class="pl-lg-4">
                                @isset($title)
                                <div class="form-group">
                                    <label class="form-control-label" for="input-id">{{ __('ID') }}</label>
                                    <input type="text" id="input-id" name="id"
                                           class="form-control form-control-alternative"
                                           placeholder="{{ __('ID') }}"
                                           value="{{ old('id', $title->id ?? "") }}" readonly/>
                                </div>
                                @endisset
                                <div class="form-group">
                                    <label class="form-control-label" for="input-name">{{ __('Tên danh hiệu') }}</label>
                                    <input type="text" id="input-name" name="name"
                                           class="form-control form-control-alternative"
                                           placeholder="{{ __('Tên') }}"
                                           value="{{ old('name', $title->name ?? "") }}">
                                </div>
                                <div class="form-group">
                                    <label for="example-datetime-local-input1" class="form-control-label">Ngày bắt
                                        đầu</label>
                                    <input class="form-control" name="start" type="datetime-local"
                                           id="example-datetime-local-input1"
                                           value="{{ date('Y-m-d\TH:i', strtotime($title->start ?? now())) }}">
                                </div>
                                <div class="form-group">
                                    <label for="example-datetime-local-input2" class="form-control-label">Ngày kêt
                                        thúc</label>
                                    <input class="form-control" name="finish" type="datetime-local"
                                           id="example-datetime-local-input2"
                                           value="{{ date('Y-m-d\TH:i', strtotime($title->finish ?? now()))}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endrole

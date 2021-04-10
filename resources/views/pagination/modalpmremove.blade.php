<div class="card-body">
  <div class="row">
    <div class="col-md-8 col-lg-3 ml-2">
      @foreach($machinepmtemplateremove as $datapm)
      <div class="form-check">
        <label  class="form-check-label">
          <input class="form-check-input" type="checkbox" id="PM_TEMPLATE_UNID_REF" name="PM_TEMPLATE_UNID_REF" value="{{ $datapm->UNID }}">
          <span class="form-check-sign" name="PM_TEMPLATE_NAME">{{ $datapm->PM_TEMPLATE_NAME }}</span>
        </label>
      </div>
    @endforeach
    </div>

</div>
 {!! $machinepmtemplateremove->links() !!}

</div>

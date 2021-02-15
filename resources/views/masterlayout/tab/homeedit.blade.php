<div class="tab-pane active" id="home">
  <div class="row">
    <div class="col-sm-12">
      <div class="jumbotron">
        <div class="col-md-8 col-lg-12">
          <div class="table">
          <table class="table table-sm"  >
            <thead>
              <tr>
                <th class="bg-primary" colspan="6" >
                  <h3 align="center" style="color:white;" class="mt-2">ข้อมูลทั่วไป</h3>
                </th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
        <div class="row">
          <div class="col-md-8 col-lg-3">
            <div class="form-group">
              <label for="MACHINE_PARTNO">PartNo</label>
                <input type="text" class="form-control" id="MACHINE_PARTNO" name="MACHINE_PARTNO" value="{{ $data_set->MACHINE_PARTNO }}">
            </div>
            <div class="form-group">
              <label for="MACHINE_PRICE">ราคา	</label>
              <input type="text" class="form-control" id="MACHINE_PRICE" name="MACHINE_PRICE" value="{{ $data_set->MACHINE_PRICE }}">
            </div>
            <div class="form-group">
              <label for="MACHINE_POWER">Power</label>
              <input type="text" class="form-control" id="MACHINE_POWER" name="MACHINE_POWER" value="{{ $data_set->MACHINE_POWER }}">
            </div>
          </div>
          <div class="col-md-8 col-lg-3">
            <div class="form-group">
              <label for="MACHINE_MODEL">Model</label>
              <input type="text" class="form-control" id="MACHINE_MODEL" name="MACHINE_MODEL"  value="{{ $data_set->MACHINE_MODEL }}">
            </div>
            <div class="form-group">
              <label for="MACHINE_MA_COST">ค่าใช้จ่ายซ่อมบำรุง	</label>
              <input type="text" class="form-control" id="MACHINE_MA_COST" name="MACHINE_MA_COST"  value="{{ $data_set->MACHINE_MA_COST }}">
            </div>
            <div class="form-group">
              <label for="MACHINE_WEIGHT">Weight	</label>
              <input type="text" class="form-control" id="MACHINE_WEIGHT" name="MACHINE_WEIGHT"  value="{{ $data_set->MACHINE_WEIGHT }}">
            </div>
          </div>
          <div class="col-md-8 col-lg-3">
            <div class="form-group">
              <label for="MACHINE_SERIAL">Serial</label>
              <input type="text" class="form-control" id="MACHINE_SERIAL" name="MACHINE_SERIAL" value="{{ $data_set->MACHINE_SERIAL }}">
            </div>
            <div class="form-group">
              <label for="MACHINE_SPEED_UNIT">ความเร็ว</label>
              <input type="text" class="form-control" id="MACHINE_SPEED_UNIT" name="MACHINE_SPEED_UNIT" value="{{ $data_set->MACHINE_SPEED_UNIT }}">
            </div>
            <div class="form-group">
              <label for="MACHINE_TARGET">Target</label>
              <input type="text" class="form-control" id="MACHINE_TARGET" name="MACHINE_TARGET" value="{{ $data_set->MACHINE_TARGET }}">
            </div>
          </div>
          <div class="col-md-8 col-lg-3">
            <div class="form-group">
              <label for="MACHINE_MANU">บริษัทที่ผลิต	</label>
              <input type="text" class="form-control" id="MACHINE_MANU" name="MACHINE_MANU" value="{{ $data_set->MACHINE_MANU }}" >
            </div>
            <div class="form-group">
              <label for="MACHINE_SPEED">ความเร็ว</label>
              <input type="text" class="form-control" id="MACHINE_SPEED" name="MACHINE_SPEED" value="{{ $data_set->MACHINE_SPEED }}">
            </div>
            <div class="form-group">
              <label for="MACHINE_MTBF">Priority</label>
              <input type="text" class="form-control" id="MACHINE_MTBF" name="MACHINE_MTBF" value="{{ $data_set->MACHINE_MTBF }}">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

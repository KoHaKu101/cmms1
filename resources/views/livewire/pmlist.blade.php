  <div id="result"class="card-body " >
    <div class="row">
      @foreach ($machinepmplan as $number => $dataset)
        <div class="col-sm-6 col-md-3 " >
              <div class="card card-stats card-round ">

                  <a href="{{ $dataset->classtext == 'icon-mute' ? '#' : url('machine/pm/plancheck/'.$dataset->UNID) }}" style="text-decoration:none">

                    {{-- fas fa-check-circle
                    fas fa-check
                    fas fa-cog
                    fas fa-cogs
                    fas fa-user-edit
fas fa-user-cog
fas fa-user-clock --}}
                  <div class="card-body {{ $dataset->classtext == 'icon-mute' ? 'no-mouse' : ''}} ">
                    <div class="card-title bg-primary text-white text-center">PM : {{ $dataset->PM_MASTER_NAME }}</div>
                    <div class="row align-items-center my-1">
                      <div class="col-icon">
                        <div class="icon-big text-center {{$dataset->classtext}} bubble-shadow-small" >
                          @php
                           $ICON_STATUS  = array( 'NEW' => 'flaticon-stopwatch' , 'EDIT' => 'fas fa-user-cog', 'COMPLETE' => 'fas fa-check-circle');
                           // $ICON_COLOR   = array( 'NEW' => 'mute' , 'EDIT' => 'fas fa-user-cog', 'COMPLETE' => 'fas fa-check-circle');
                          @endphp
                          <i class="{{ $ICON_STATUS[$dataset->PLAN_STATUS] }}"></i>
                        </div>
                      </div>
                      <div class="col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                          <p class="card-title">{{$dataset->MACHINE_CODE}}</p>
                          <h4 class="card-category">LINE : {{$dataset->MACHINE_LINE}}</h4>
                          <h4 class="card-category">{{ $dataset->PLAN_DATE }}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
      @endforeach

      </div>
    {{ $machinepmplan->links() }}
  </div>

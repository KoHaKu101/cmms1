  <div id="result"class="card-body">
    <div class="row">
      @foreach ($machinepmplan as $number => $dataset)
        <div class="col-sm-6 col-md-3">
              <div class="card card-stats card-round">
                <a href="{{ url('machine/pm/plancheck/'.$dataset->UNID) }}" style="text-decoration:none">
                  <div class="card-body ">
                    <div class="card-title bg-primary text-white text-center ">PM : {{ $dataset->PM_MASTER_NAME }}</div>
                    <div class="row align-items-center my-1">
                      <div class="col-icon">
                        <div class="icon-big text-center {{$dataset->classtext}} bubble-shadow-small" >
                          <i class="flaticon-stopwatch"></i>
                        </div>
                      </div>
                      <div class="col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                          <p class="card-title">{{$dataset->MACHINE_CODE}} </p>
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

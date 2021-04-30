          <div style="position:relative">
            <input wire:model="search" type="search" id="search"  name="search" class="form-control relative" type="text" placeholder="search..."/>

          </div>
          <div >
            {{ $search }}

              @foreach($empcode as $dataempcode)
              <li class="list-group-item"><span>{{$dataempcode->EMP_CODE}}</span></li>
              @endforeach


          </div>

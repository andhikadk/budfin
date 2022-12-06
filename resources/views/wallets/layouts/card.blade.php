<div class="row">
  {{-- Cash Wallet --}}
  {{-- set id for this card to id cash --}}
  <div class="col-xl-3 col-md-6 mb-3">
    <div class="card border border-secondary border-end-0 border-top-0 border-bottom-0 border-4 shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col">
            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Cash</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 
              {{ number_format( $wallets->where('name', 'cash')->first()->amount, 2,",",".") }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fa-solid fa-sack-dollar fa-2x opacity-25"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- People's Debt --}}
  <div class="col-xl-3 col-md-6 mb-3">
    <div class="card border border-success border-end-0 border-top-0 border-bottom-0 border-4 shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">people's debts</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 
              {{ number_format( $wallets->where('name', 'people_debt')->first()->amount, 2,",",".") }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fa-solid fa-money-bill-wave fa-2x opacity-25"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Your Debt --}}
  <div class="col-xl-3 col-md-6 mb-3">
    <div class="card border border-danger border-end-0 border-top-0 border-bottom-0 border-4 shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Your Debt</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 
              {{ number_format( $wallets->where('name', 'your_debt')->first()->amount, 2,",",".") }}
            </div>
          </div>
          <div class="col-auto">
            <i class="fa-solid fa-hand-holding-dollar fa-2x opacity-25"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Delete wallet card --}}
  <div class="col-xl-3 col-md-6 mb-3">
    <div class="card border-secondary shadow h-100 py-2" style="border: 1px dashed;">
      <div class="card-body d-flex justify-content-center">
        <div class="row no-gutters align-items-center">
          <div class="col">
            <div class="text-xs font-weight-bold mb-1 text-uppercase text-secondary"></div>
            <a href="" class="btn text-muted stretched-link" data-bs-toggle="modal" data-bs-target="#deleteWallet">
              <i class="fa-solid fa-trash"></i> Delete Wallet
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<hr>

<div class="row">
  {{-- loop foreach that show all wallet in auth user --}}
  @foreach ($wallets as $wallet)
    @if ($wallet->type === 'cash' || $wallet->type === 'debt')
      @continue
    @endif
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border {{ $wallet->type === 'bank' ? 'border-primary' : 'border-secondary' }} border-end-0 border-top-0 border-bottom-0 border-4 shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col">
              <div class="text-xs font-weight-bold text-uppercase mb-1 {{ $wallet->type === 'bank' ? 'text-primary' : 'text-secondary' }}">{{ $wallet->name }}</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ number_format( $wallet->amount, 2,",",".") }}</div>
            </div>
            <div class="col-auto">
              <i class="fa-solid fa-wallet fa-2x opacity-25"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach

  {{-- Create add card --}}
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-secondary shadow h-100 py-2" style="border: 1px dashed;">
      <div class="card-body d-flex justify-content-center">
        <div class="row no-gutters align-items-center">
          <div class="col">
            <div class="text-xs font-weight-bold mb-1 text-uppercase text-secondary"></div>
            <a href="" class="btn text-muted stretched-link" data-bs-toggle="modal" data-bs-target="#createWallet">
              <i class="fa-solid fa-plus"></i> Add New Wallet
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

{{-- Create Wallet Modal --}}
<div class="modal fade" id="createWallet" tabindex="-1" aria-labelledby="createWalletLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="createWalletLabel">Add wallet</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/wallets" method="POST">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Wallet Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Wallet Name" required>
          </div>
          <div class="mb-3">
            <label for="type" class="form-label">Wallet Type</label>
            <select class="form-select" id="type" name="type">
              <option value="bank">Bank</option>
              <option value="ewallet">E-Wallet</option>
              <option value="invested">Invested</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount" required>
          </div>
          <button type="submit" class="btn btn-primary float-end mt-2">Create</button>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Delete Wallet Modal --}}
<div class="modal fade" id="deleteWallet" tabindex="-1" aria-labelledby="deleteWalletLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteWalletLabel">Delete wallet</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/wallets" method="POST">
          @csrf
          <h6 class="mb-3">Choose which wallet do you want to delete</h6>
          <div class="mb-3">
            @foreach ($wallets as $wallet)
              @if ($wallet->type === 'cash' || $wallet->type === 'debt')
                @continue
              @endif
              {{-- make checkbox looks button --}}
              <div class="btn-group me-2 mb-3" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="{{ $wallet->id }}" name="wallet_id" value="{{ $wallet->id }}">
                <label class="btn btn-outline-primary" for="{{ $wallet->id }}">{{ $wallet->name }}</label>
              </div>
              {{-- <div class="form-check">
                <input class="form-check-input" type="checkbox" name="wallet_id" id="{{ $wallet->id }}" value="{{ $wallet->id }}">
                <label class="form-check label" for="wallet_id">
                  {{ $wallet->name }}
                </label>
              </div> --}}
            @endforeach
          </div>
          <button type="submit" class="btn btn-danger float-end mt-2">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="text-white navbar-brand" href="{{ url('/') }}">Claraxxx E-shop</a>
            <div class="search-bar">
                <form action="{{url('searchproduct')}}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="search" class="form-control" name="product_name" required id="search-product" placeholder="Search products" aria-label="Username" aria-describedby="basic-addon1">
                        <button type="submit"  class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class=" text-white nav-link active" aria-current="page" href="{{ url('/dashboard') }}">Dashboard <i class="fas fa-home"></i></a>
          </li>
          <li class="nav-item">
            <a class="text-white nav-link" href="{{url('category')}}">Category <i class="fa fa-list-alt"></i></a>
          </li>
          <li class="nav-item position-relative">
            <a class="text-white nav-link" href="{{url('cart')}}">Cart <i class="fa fa-cart-plus"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary cart-count">0</span>
            </a>
          </li>

          <li class="nav-item position-relative">
            <a class="text-white nav-link" href="{{url('wishlist')}}">Wishlist <i class="fa-solid fa-heart"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning wishlist-count">0</span>
            </a>
          </li>
          @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="text-white nav-link" href="{{ route('login') }}">{{ __('Login') }} <i class="fa fa-sign-in"></i></a>
                    </li>
                @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="text-white nav-link" href="{{ route('register') }}">{{ __('Register') }} <i class="fa fa-registered"></i></a>
                        </li>
                @endif
                    @else
                        <li class="nav-item dropdown">
                            <a class="text-white nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <li><a class="dropdown-item" href="{{ url('my-orders') }}">
                            <i class="fa fa-list" aria-hidden="true"></i> <b> My Orders</b>
                          </a>
                      </li>

                        <li><a class="dropdown-item" href="{{ url('/dashboard') }}">
                            <i class="fas fa-user"></i> <b> Profile </b>
                            </a>
                        </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> <b> {{ __('Logout') }} </b>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                        </li>
                @endguest
                        </ul>
      </div>
    </div>
  </nav>

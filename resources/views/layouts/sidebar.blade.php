<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item  {{ $page == 'dashboard'? 'active':''  }}">
                            <a class="nav-link" href="{{ route('home') }}" >
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                                </span>
                                <span class="nav-link-title">
                                    الاحصائيات
                                </span>
                            </a>
                        </li>
                            @can('view-any', App\Models\User::class)
                                  <li class="nav-item  {{ $page == 'users'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('users.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="ti ti-users" ></i>
                                        </span>
                                        <span class="nav-link-title">
                                            المستخدمين
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Department::class)
                                  <li class="nav-item  {{ $page == 'departments'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('departments.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="ti ti-users" ></i>
                                        </span>
                                        <span class="nav-link-title">
                                            الاقسام
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Section::class)
                                  <li class="nav-item  {{ $page == 'sections'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('sections.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="ti ti-users" ></i>
                                        </span>
                                        <span class="nav-link-title">
                                            الشعبات
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Paper::class)
                                  <li class="nav-item  {{ $page == 'papers'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('papers.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="ti ti-users" ></i>
                                        </span>
                                        <span class="nav-link-title">
                                            الاوراق العلمية
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Book::class)
                                  <li class="nav-item  {{ $page == 'books'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('books.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="ti ti-users" ></i>
                                        </span>
                                        <span class="nav-link-title">
                                            الكتب
                                        </span>
                                    </a>
                                </li>
                            @endcan

                           
                            <li class="nav-item  {{ $page == 'chat'? 'active':''  }}">
                              <a class="nav-link" 
                              @if(auth()->id() == 1)
                                href="{{ route('admin.chat.index') }}"
                                @else
                                href="{{ route('user.chat.index') }}"
                                @endif
                                >
                                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                                      <i class="ti ti-users" ></i>
                                  </span>
                                  <span class="nav-link-title">
                                      محادثة
                                  </span>
                              </a>
                          </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</div>
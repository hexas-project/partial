  <!-- Menu -->

  <aside id="layout-menu" class="layout-menu menu-vertical menu">
      <div class="app-brand demo">
          <a href="{{ route('index') }}" class="app-brand-link">
              <span class="app-brand-logo demo">
                  <span class="text-primary">
                      <!--<svg width="32" height="22" viewBox="0 0 32 22" fill="none"-->
                      <!--    xmlns="http://www.w3.org/2000/svg">-->
                      <!--    <path fill-rule="evenodd" clip-rule="evenodd"-->
                      <!--        d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"-->
                      <!--        fill="currentColor" />-->
                      <!--    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"-->
                      <!--        d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />-->
                      <!--    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"-->
                      <!--        d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />-->
                      <!--    <path fill-rule="evenodd" clip-rule="evenodd"-->
                      <!--        d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"-->
                      <!--        fill="currentColor" />-->
                      <!--</svg>-->
                      <img src="{{ asset('images/new logo.png') }}" width="140px" alt="Logo">
                  </span>
              </span>
              <!-- <span class="app-brand-text demo menu-text fw-bold ms-3">Partial</span> -->
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="icon-base ti menu-toggle-icon d-none d-xl-block"></i>
              <i class="icon-base ti tabler-x d-block d-xl-none"></i>
          </a>
      </div>

      <div class="menu-inner-shadow"></div>

      <ul class="menu-inner py-1 mt-3">
          <!-- Dashboards -->
          <li class="menu-item {{ Request::routeIs('dashboard') ? 'active open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon icon-base ti tabler-smart-home"></i>
                  <div data-i18n="Dashboards">Dashboards</div>
                  {{-- <div class="badge text-bg-danger rounded-pill ms-auto">5</div> --}}
              </a>
              <ul class="menu-sub">
                  <li class="menu-item {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                      <a href="{{ route('dashboard') }}" class="menu-link">
                          <div data-i18n="Dashboards">Dashboards</div>
                      </a>
                  </li>

              </ul>
          </li>

          <!-- Listining -->




          {{-- Hide these modules for teachers (role == 2). Show for admin (1) & students (0). --}}
          @if (auth()->check() && auth()->user()->role != 2)

              <!-- Listening -->
              <li class="menu-item {{ Request::routeIs('listening.*') ? 'active open' : '' }}">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon icon-base ti tabler-headphones"></i>
                      <div>Listening</div>
                  </a>
                  <ul class="menu-sub">
                      @if (auth()->user()->role == 1)
                          <li class="menu-item {{ Request::routeIs('listening.answer') ? 'active' : '' }}">
                              <a href="{{ route('listening.answer') }}" class="menu-link">
                                  <div>Create Answer</div>
                              </a>
                          </li>
                      @endif

                      <li class="menu-item {{ Request::routeIs('listening.results.band') ? 'active' : '' }}">
                          <a href="{{ route('listening.results.band') }}" class="menu-link">
                              <div>Result</div>
                          </a>
                      </li>

                      <!-- <li class="menu-item {{ Request::routeIs('listening.results.list') ? 'active' : '' }}">
                          <a href="{{ route('listening.results.list') }}" class="menu-link">
                              <div>Result List</div>
                          </a>
                      </li> -->
                  </ul>
              </li>

              {{-- Reading --}}
              <li class="menu-item {{ Request::routeIs('reading.*') ? 'active open' : '' }}">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon icon-base ti tabler-book"></i>
                      <div>Reading</div>
                  </a>
                  <ul class="menu-sub">
                      @if (auth()->user()->role == 1)
                          <li class="menu-item {{ Request::routeIs('reading.answer') ? 'active' : '' }}">
                              <a href="{{ route('reading.answer') }}" class="menu-link">
                                  <div>Create Answer</div>
                              </a>
                          </li>
                      @endif

                      <li class="menu-item {{ Request::routeIs('reading.results.band') ? 'active' : '' }}">
                          <a href="{{ route('reading.results.band') }}" class="menu-link">
                              <div>Result</div>
                          </a>
                      </li>

                      <!-- <li class="menu-item {{ Request::routeIs('reading.results.list') ? 'active' : '' }}">
                          <a href="{{ route('reading.results.list') }}" class="menu-link">
                              <div>Result List</div>
                          </a>
                      </li> -->
                  </ul>
              </li>

              {{-- Writing --}}
              <li class="menu-item {{ Request::routeIs('writing.*') ? 'active open' : '' }}">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon icon-base ti tabler-pencil"></i>
                      <div>Writing</div>
                  </a>
                  <ul class="menu-sub">
                      <li class="menu-item {{ Request::routeIs('writing.results.list') ? 'active' : '' }}">
                          <a href="{{ route('writing.results.list') }}" class="menu-link">
                              <div>Writing List</div>
                          </a>
                      </li>
                  </ul>
              </li>

          @endif











          @if (auth()->check() && auth()->user()->role == 1)
              <!-- <li class="menu-item {{ Request::routeIs('register.*') ? 'active open' : '' }}">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon icon-base ti tabler-user-plus"></i>
                      <div>Register</div>
                  </a>
                  <ul class="menu-sub">
                      <li class="menu-item {{ Request::routeIs('register.user') ? 'active' : '' }}">
                          <a href="{{ route('register.user') }}" class="menu-link">
                              <div>Student Register</div>
                          </a>
                      </li>
                      <li class="menu-item {{ Request::routeIs('register.teacher.list') ? 'active' : '' }}">
                          <a href="{{ route('register.teacher.list') }}" class="menu-link">
                              <div>Teacher Register</div>
                          </a>
                      </li>
                  </ul>
              </li> -->
              {{-- Student Management  --}}
              <li class="menu-item {{ Request::routeIs('batch.enrollment.*', 'view.students.*') ? 'active open' : '' }}">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon icon-base ti tabler-users"></i>
                      <div>Student</div>
                  </a>
                  <ul class="menu-sub">
                      <li class="menu-item {{ Request::routeIs('batch.enrollment.page') ? 'active' : '' }}">
                          <a href="{{ route('batch.enrollment.page') }}" class="menu-link">
                              <div>Student Enrollment</div>
                          </a>
                      </li>
                      <li class="menu-item {{ Request::routeIs('view.students.page') ? 'active' : '' }}">
                          <a href="{{ route('view.students.page') }}" class="menu-link">
                              <div>View Students</div>
                          </a>
                      </li>
                  </ul>
              </li>
              {{-- Assign Management  --}}
              <li class="menu-item {{ Request::routeIs('assign.test.*', 'assigned.test.*') ? 'active open' : '' }}">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon icon-base ti tabler-clipboard-check"></i>
                      <div>Assign</div>
                  </a>
                  <ul class="menu-sub">
                      <li class="menu-item {{ Request::routeIs('assign.test.page') ? 'active' : '' }}">
                          <a href="{{ route('assign.test.page') }}" class="menu-link">
                              <div>Assign Test</div>
                          </a>
                      </li>
                  </ul>
              </li>
          @endif

          {{-- Teacher-only: My Batches --}}



          @if (auth()->check() && auth()->user()->role == 2)
              @php
                  $myBatches = auth()->user()->batches()->pluck('batch')->unique()->sort()->values();
                  $route = optional(request()->route());
                  $routeName = $route ? $route->getName() : null;
                  $paramBatch = $route ? $route->parameter('batch') : null; // for Students page
                  $queryBatch = request('batch'); // for Results list pages
                  $topOpen = in_array(
                      $routeName,
                      ['batch.students', 'listening.results.list', 'reading.results.list', 'writing.results.list'],
                      true,
                  );
              @endphp

              <li class="menu-item {{ $topOpen ? 'active open' : '' }}">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon icon-base ti tabler-users"></i>
                      <div>My Batches</div>
                  </a>

                  <ul class="menu-sub">
                      @forelse ($myBatches as $batch)
                          @php
                              $isStudents = $routeName === 'batch.students' && $paramBatch === $batch;
                              $isListening = $routeName === 'listening.results.list' && $queryBatch === $batch;
                              $isReading = $routeName === 'reading.results.list' && $queryBatch === $batch;
                              $isWriting = $routeName === 'writing.results.list' && $queryBatch === $batch;
                              $isOpenThis = $isStudents || $isListening || $isReading || $isWriting;
                          @endphp

                          <li class="menu-item {{ $isOpenThis ? 'active open' : '' }}">
                              <a href="javascript:void(0);" class="menu-link menu-toggle">
                                  <div>{{ $batch }}</div>
                              </a>

                              <ul class="menu-sub">
                                  <li class="menu-item {{ $isStudents ? 'active' : '' }}">
                                      <a href="{{ route('batch.students', $batch) }}" class="menu-link">
                                          <div>Students</div>
                                      </a>
                                  </li>

                                  <li class="menu-item {{ $isListening ? 'active' : '' }}">
                                      <a href="{{ route('listening.results.list', ['batch' => $batch]) }}"
                                          class="menu-link">
                                          <div>Listening Results</div>
                                      </a>
                                  </li>

                                  <li class="menu-item {{ $isReading ? 'active' : '' }}">
                                      <a href="{{ route('reading.results.list', ['batch' => $batch]) }}"
                                          class="menu-link">
                                          <div>Reading Results</div>
                                      </a>
                                  </li>

                                  <li class="menu-item {{ $isWriting ? 'active' : '' }}">
                                      <a href="{{ route('writing.results.list', ['batch' => $batch]) }}"
                                          class="menu-link">
                                          <div>Writing Results</div>
                                      </a>
                                  </li>
                              </ul>
                          </li>
                      @empty
                          <li class="menu-item">
                              <a href="javascript:void(0);" class="menu-link">
                                  <div>No batches assigned</div>
                              </a>
                          </li>
                      @endforelse
                  </ul>
              </li>
          @endif

          <!-- Evaluation -->
          <li class="menu-item {{ Request::routeIs('evaluation.*') ? 'active open' : '' }}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon icon-base ti tabler-clipboard-check"></i>
                  <div>Evaluation</div>
              </a>
              <ul class="menu-sub">
                  <li class="menu-item {{ Request::routeIs('evaluation.ielts') ? 'active' : '' }}">
                      <a href="{{ route('evaluation.ielts') }}" class="menu-link">
                          <div>Student Evaluation</div>
                      </a>
                  </li>
              </ul>
          </li>


      </ul>
  </aside>

  <div class="menu-mobile-toggler d-xl-none rounded-1">
      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
          <i class="ti tabler-menu icon-base"></i>
          <i class="ti tabler-chevron-right icon-base"></i>
      </a>
  </div>
  <!-- / Menu -->

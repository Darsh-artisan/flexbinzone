 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

     @php
         $urls = [];
         $urls[] = Request::segment(2);
         $urls[] = Request::segment(3);
         $url = array_filter($urls);
         $role_id = Auth::user()->role_id;
         $permission_ids = App\Models\RoleHasPermissions::where('role_id', $role_id)->pluck('permission_id')->toArray();
         $role = Spatie\Permission\Models\Permission::where('name', 'roles')->first();
         $user = Spatie\Permission\Models\Permission::where('name', 'users')->first();
         $userStatus = Spatie\Permission\Models\Permission::where('name', 'userStatus')->first();

     @endphp

     <ul class="sidebar-nav" id="sidebar-nav">

         <li class="nav-item">
             <a class="nav-link
            {{-- Active Tab Class --}}
            {{ in_array('dashboard', $url) ? 'active-tab' : '' }}"
                 href="{{ route('dashboard') }}">
                 <i
                     class="bi bi-grid
                {{-- Icon Tab Class --}}
                {{ in_array('dashboard', $url) ? 'icon-tab' : '' }}"></i>
                 <span>{{ __('Dashboard') }}</span>
             </a>
         </li>

         {{-- User Tab --}}
         @if (in_array($role->id, $permission_ids) ||
                 in_array($user->id, $permission_ids) ||
                 in_array($userStatus->id, $permission_ids))
             <li class="nav-item">
                 <a class="nav-link {{ strpos(Route::currentRouteName(), 'roles') !== false || strpos(Route::currentRouteName(), 'users') !== false || strpos(Route::currentRouteName(), 'userStatus') !== false ? 'active-tab' : 'collapsed' }}"
                     data-bs-target="#users-nav" data-bs-toggle="collapse" href="#"
                     aria-expanded="{{ strpos(Route::currentRouteName(), 'roles') !== false || strpos(Route::currentRouteName(), 'users') !== false || strpos(Route::currentRouteName(), 'userStatus') !== false ? 'true' : 'false' }}">
                     <i class="fa-solid fa-users icon-tab"></i><span>Users</span><i
                         class="bi bi-chevron-down ms-auto icon-tab"></i>
                 </a>

                 <ul id="users-nav"
                     class="nav-content sidebar-ul collapse {{ strpos(Route::currentRouteName(), 'roles') !== false || strpos(Route::currentRouteName(), 'users') !== false || strpos(Route::currentRouteName(), 'userStatus') !== false ? 'show' : '' }}"
                     data-bs-parent="#sidebar-nav">
                     @if (in_array($role->id, $permission_ids))
                         <li>
                             <a href="{{ route('roles') }}"
                                 class="{{ strpos(Route::currentRouteName(), 'roles') !== false ? 'active-link' : '' }}">
                                 <i
                                     class="{{ strpos(Route::currentRouteName(), 'roles') !== false ? 'bi bi-circle-fill' : 'bi bi-circle' }}"></i><span>Roles</span>
                             </a>
                         </li>
                     @endif
                     @if (in_array($user->id, $permission_ids))
                         <li>
                             <a href="{{ route('users') }}"
                                 class="{{ strpos(Route::currentRouteName(), 'users') !== false ? 'active-link' : '' }}">
                                 <i
                                     class="{{ strpos(Route::currentRouteName(), 'users') !== false ? 'bi bi-circle-fill' : 'bi bi-circle' }}"></i><span>Users</span>
                             </a>
                         </li>
                     @endif
                     @if (in_array($userStatus->id, $permission_ids))
                         <li>
                             <a href="{{ route('userStatus') }}"
                                 class="{{ strpos(Route::currentRouteName(), 'userStatus') !== false ? 'active-link' : '' }}">
                                 <i
                                     class="{{ strpos(Route::currentRouteName(), 'userStatus') !== false ? 'bi bi-circle-fill' : 'bi bi-circle' }}"></i><span>User
                                     Status</span>
                             </a>
                         </li>
                     @endif
                 </ul>
             </li>
         @endif




     </ul>

 </aside>
 <!-- End Sidebar-->

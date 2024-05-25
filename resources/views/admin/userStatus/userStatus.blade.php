@extends('admin.layouts.admin-layout')

@section('title', 'Users')

@section('content')

<div class="pagetitle">
    <h1>Users Status</h1>
    <div class="row">
        <div class="col-md-8">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Users Status</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

 {{-- Category Section --}}
 <section class="section dashboard">
    <div class="row">

        {{-- Categories Card --}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                    </div>
                    <div class="table-responsive custom_dt_table">
                        <table class="table w-100" id="UserstatusTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Login Date</th>
                                    <th>Logout Date</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection


{{-- Custom Script --}}
@section('page-js')


    <script type="text/javascript">
        $(function() {
            var table = $('#UserstatusTable').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 10,
                ajax: "{{ route('userStatus') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'user_name',
                        name: 'user_name'
                    },
                    {
                        data: 'login_date_time',
                        name: 'login_date_time'
                    },
                    {
                        data: 'logout_date_time',
                        name: 'logout_date_time',

                    },
                ]
            });

        });

    </script>

@endsection

@extends('layouts.app2')

@push('style')
    <style>
        /* Dark theme */
        [data-bs-theme=dark] text,
        button,
        btn {
            color: beige !important;
        }

        /* Light theme */
        [data-bs-theme=light] text,
        button,
        btn {
            color: Black !important;
        }
    </style>
@endpush

@section('row_content')
    <div class="card bg-gba-light border-gba">
        <div class="card-header border-0 pt-6 mx-auto">
            <h2>All Users</h2>
        </div>
        @if (session()->has('message'))
            <p>
                {{ session()->get('message') }}
            </p>
        @endif

        <div class="card-header">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" data-kt-permissions-table-filter="search" placeholder="Search Users"
                        class="form-control form-control-solid w-250px ps-13" />
                </div>
            </div>

            <div class="card-toolbar">
                @can('user create')
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <a href="{{ route('user.create') }}" class="btn bg-gba">
                            <span>
                                <i class="ki-duotone ki-plus fs-2"></i>Add User
                            </span>
                        </a>
                    </div>
                @endcan
            </div>
        </div>

        <div class="card-body py-4">
            <table class="table align-middle table-row-dashed fs-6" id="kt_table_users">
                <thead class="bg-gba">
                    <tr class="text-start fw-bold fs-7 text-uppercase gs-0">
                        <th class="text-center">Name</th>
                        <th class="text-center">{{ __('Email') }}</th>

                        @canany(['user edit', 'user delete'])
                            <th class="text-center">Role</th> <!-- Added Role Column -->
                            <th class="text-center">Joined Date</th> <!-- Add column header for joined date -->
                            <th class="text-center">{{ __('Actions') }}</th>
                        @endcanany
                    </tr>
                </thead>

                <tbody class="text-start fw-semibold bg-gba-light">
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <div class="text-center">
                                    <a href="{{ route('user.show', $user->id) }}"
                                        class="text-gray-800 text-hover-primary mb-1"></a>{{ $user->name }}
                                </div>
                            </td>
                            <td class="text-center">{{ $user->email }}</td>

                            @canany(['user edit', 'user delete'])
                                <td class="text-center">
                                    @foreach ($user->roles as $role)
                                        <div
                                            class="
															@if ($role->name == 'super-admin') badge badge-light-danger fw-bold
															@elseif($role->name == 'admin')
															badge badge-light-warning fw-bold
															@elseif($role->name == 'writer')
															badge badge-light-success fw-bold
															@elseif($role->name == '')
															badge badge-light-info fw-bold @endif
														">
                                            {{ $role->name }}
                                        </div>

                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </td> <!-- Display user's role -->
                                <td class="text-center">{{ $user->created_at->format('d M Y, h:i a') }}</td> <!-- Display joined date -->
                                <td class="text-center">
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                        <!-- <a href="{{ route('user.show', $user->id) }}" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm">{{ __('View') }}<span><i></i></span></a> -->
                                        @can('user edit')
                                            <a href="{{ route('user.edit', $user->id) }}"
                                                class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm">{{ __('Edit') }}<span><i></i></span></a>
                                        @endcan
                                        @can('user delete')
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm">{{ __('Delete') }}<span><i></i></span></button>
                                        @endcan
                                    </form>
                                </td>
                            @endcanany
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

    <script>
        window.deleteConfirm = function(membershipId) {
            Swal.fire({
                icon: "warning",
                text: "Do you want to cancel this membership?",
                showCancelButton: true,
                confirmButtonText: "Delete",
                confirmButtonColor: "#e3342f",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Select Reason for Cancellation",
                        input: "select",
                        inputOptions: {
                            reason1: "Reason 1",
                            reason2: "Reason 2",
                            reason3: "Reason 3",
                            reason4: "Reason 4",
                        },
                        inputPlaceholder: "Select a reason",
                        showCancelButton: true,
                        inputValidator: (value) => {
                            return new Promise((resolve) => {
                                if (value === "") {
                                    resolve("You need to select a reason for cancellation");
                                } else {
                                    window.location.href = membershipId;
                                }
                            });
                        },
                    });
                }
            });
        };
    </script>
@endpush

@extends('layouts.app2')

@section('row_content')
<div class="card">
  <!--begin::Header-->
  <div class="card-header border-0 pt-5">
    <h3 class="card-title align-items-start flex-column">
      <span class="card-label fw-bold fs-3 mb-1">Memberships</span>
      <span class="text-muted mt-1 fw-semibold fs-7"
        >See All Memberships.</span
      >
    </h3>
  </div>

  <!--end::Header-->
  <div class="table-responsive px-4 pb-4">
    <table class="table table-flush" id="datatable-search">
      {{-- <input name="daterange" class="form-control" style="width: 14em;" /><br> --}}
      <thead class="thead-light">
        <tr class="fw-bold text-muted bg-light p-3">
          <th class="text-start rounded-start">Name</th>
          <th>Surname</th>
          <th>ID Number</th>
          <th>Gender</th>
          {{-- <th>Age</th> --}}
          <th>Telephone</th>
          <th>Join Date</th>
          <th>End Date</th>
          <th>Status</th>
          <th class="text-center rounded-end">Manage</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($memberships as $membership)
        <tr>
          <td
            class="text-m font-weight-normal pt-3 text-dark fw-bold text-hover-primary d-block"
          >
            {{ $membership->name }}
          </td>
          <td class="text-m font-weight-normal pt-3">
            {{ $membership->surname }}
          </td>
          <td class="text-m font-weight-normal pt-3">
            {{ $membership->id_number }}
          </td>
          <td class="text-m font-weight-normal pt-3">
            {{$membership->gender_id}}
          </td>
          {{-- @php $age = ageFromDOB($membership->person->birth_date); @endphp --}}
          {{-- <td class="text-m font-weight-normal pt-3">{{ $age }}</td> --}}
          <td class="text-m font-weight-normal pt-3">
            {{ $membership->primary_contact_number }}
          </td>
          <td class="text-m font-weight-normal pt-3">
            {{
                    Carbon\Carbon::parse($membership->join_date)->format('d/m/Y') }}
          </td>
          <td class="text-m font-weight-normal pt-3">
            {{
                    Carbon\Carbon::parse($membership->end_date)->format('d/m/Y') }}
          </td>
          <td class="text-m font-weight-normal pt-3">
            <span
              class="badge badge-light-primary fs-7 fw-bold"
              >{{ $membership->bu_membership_status_id }}</span
            >
          </td>
          <td class="text-m text-center w-5 font-weight-normal">
            <a
              class="btn btn-link text-success text-gradient mx-3 mb-0"
              href="/view-member/{{ $membership->id }}"
              ><i class="bi bi-eye-fill"></i>View</a
            >
            <a
              class="btn btn-link text-warning text-gradient mx-3 mb-0"
              href="/edit-member/{{ $membership->id }}"
              ><i class="bi bi-pencil-fill"></i>Edit</a
            >
            <a
              class="btn btn-link text-danger text-gradient mx-3 mb-0"
              href="#"
              onclick="deleteConfirm('/cancel-member/{{ $membership->id }}')"
              ><i class="bi bi-trash3-fill" read-only></i>Cancel</a
            >
          </td>
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
  window.deleteConfirm = function (membershipId) {
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


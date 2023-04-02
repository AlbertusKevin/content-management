@extends('partial.main')
@section('content')
    <div class="row mt-4">
        <div class="col-md-6">
            <p>Daftar status dari ide-ide yang akan dimasukkan ke dalam daftar perencanaan pengerjaan.</p>
            <div class="card" style="min-height: 400px;">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ $module }} - Daftar Status Dari Ide</h5>
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#new-idea-status"><i class='bx bx-message-square-add'></i> Tambah</button>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_of_idea_status as $idea_status)
                                <tr>
                                    <th scope="row">{{ $idea_status->getId() }}</th>
                                    <td>{{ $idea_status->getStatus() }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    @include('data_master.idea_status.form_create')
@endsection
